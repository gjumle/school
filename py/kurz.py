
from tokenize import group


euro = [25.25, 25.26, 25.27, 25.32, 25.30, 25.29, 25.32, 25.34]
temp = 0
rust = 0
maxRust = 0

for i in euro:
    if temp == 0:
        temp = i
    else:
        if temp < i:
            rust += 1
        else:
            if rust > maxRust:
                maxRust = rust
            rust = 0
        temp = i
if rust > maxRust:
    maxRust = rust

print(rust)
