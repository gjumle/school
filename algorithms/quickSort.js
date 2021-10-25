function quickSort(arr, left, right) {
    function partition(arr, left, right) {
        let pivot = arr[Math.floor((left + right) / 2)]
        let i = left;
        let j = right;
        while (i <= j) {
            while (arr[i] < pivot) {
                i++;
            }
            while (arr[j] > pivot) {
                j--;
            }
            if (i <= j) {
                [arr[i], arr[j]] = [arr[j], arr[i]];
                i++;
                j--;
            }
        }
        return i;
    }
    if (arr.length > 1) {
        var index = partition(arr, left, right);
        if (left < index - 1) {
            quickSort(arr, left, index - 1);
        }
        if (index < right) {
            quickSort(arr, index, right);
        }
    }
    return arr;
}

//Implementation
testArr = [0, 15, 25, 2, 0.2, 18, 45, 18];
testRight = testArr.length;
var startTime = performance.now();
console.log(quickSort(testArr, 0, testRight));
var endTime = performance.now();
