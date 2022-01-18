USE sales;


CREATE TABLE sales
(
    sales_id       INT UNSIGNED  NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_name   VARCHAR(128)  NOT NULL,
    product_price  DECIMAL(8, 2) NOT NULL,
    product_amount SMALLINT      NOT NULL
);


INSERT INTO sales
VALUES (NULL, 'Apple', 1.25, 1),
       (NULL, 'Apple', 2.40, 2),
       (NULL, 'Apple', 4.05, 3),
       (NULL, 'Pear', 6.30, 2),
       (NULL, 'Pear', 12.20, 4),
       (NULL, 'Plum', 4.85, 3);


CREATE VIEW V_sales_stats AS
SELECT product_name,
       SUM(product_price)  AS price_sum,
       SUM(product_amount) AS amount_sum,
       AVG(product_price)  AS price_avg,
       AVG(product_amount) AS amount_avg,
       COUNT(*)            AS sales_cnt
FROM sales
GROUP BY product_name
ORDER BY product_name;


SELECT *
FROM V_sales_stats;


CREATE PROCEDURE P_insertData(IN numOfRows INT)
BEGIN
    SET @x = 0;
    REPEAT
        INSERT INTO sales VALUES (NULL, 'Apple', FLOOR(RAND() * 1000) / 100, FLOOR(RAND() * 6));
        INSERT INTO sales VALUES (NULL, 'Pear', FLOOR(RAND() * 1000) / 100, FLOOR(RAND() * 6));
        INSERT INTO sales VALUES (NULL, 'Plum', FLOOR(RAND() * 1000) / 100, FLOOR(RAND() * 6));
        SET @x = @x + 1;
    UNTIL @x >= numOfRows END REPEAT;
END;


CALL P_insertData(100000);


SELECT *
FROM V_sales_stats;


CREATE TABLE mv_sales_stats
(
    product_name VARCHAR(128)   NOT NULL,
    price_sum    DECIMAL(10, 2) NOT NULL,
    amount_sum   INT            NOT NULL,
    price_avg    FLOAT          NOT NULL,
    amount_avg   FLOAT          NOT NULL,
    sales_cnt    INT            NOT NULL,
    UNIQUE INDEX product (product_name)
);


INSERT INTO mv_sales_stats
SELECT *
FROM v_sales_stats;


SELECT *
FROM mv_sales_stats;


CREATE PROCEDURE p_refresh_mv_sales_stats()
BEGIN
    TRUNCATE TABLE mv_sales_stats;
    INSERT INTO mv_sales_stats SELECT * FROM v_sales_stats;
END;


CREATE TRIGGER T_AI_sales
    AFTER INSERT
    ON sales
    FOR EACH ROW
BEGIN
    SELECT price_sum, amount_sum, price_avg, amount_avg, sales_cnt
    FROM mv_sales_stats
    WHERE product_name = NEW.product_name
    INTO @old_price_sum, @old_amount_sum, @old_price_avg, @old_amount_avg, @old_sales_cnt;

    SET @new_price_sum = IFNULL(@old_price_sum, 0) + NEW.product_price;
    SET @new_amount_sum = IFNULL(@old_amount_sum, 0) + NEW.product_amount;
    SET @new_sales_cnt = IFNULL(@old_sales_cnt, 0) + 1;
    SET @new_price_avg = @new_price_sum / @new_sales_cnt;
    SET @new_amount_avg = @new_amount_sum / @new_sales_cnt;

    DELETE FROM mv_sales_stats WHERE product_name = NEW.product_name;
    INSERT INTO mv_sales_stats
    VALUES (NEW.product_name, @new_price_sum, @new_amount_sum, @new_price_avg, @new_amount_avg, @new_sales_cnt);
END;