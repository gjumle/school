from traceback import print_tb
from bs4 import BeautifulSoup
import requests

page = requests.get('https://www.kurim.cz/cs/obcan/stav-vyrizeni-zadosti.html')
soup = BeautifulSoup(page.content, 'lxml')
html = soup.prettify()
print(html)

with open('page_check.html', 'w') as f:
    f.write(html)

match = soup.find_all('div')
print(match)
