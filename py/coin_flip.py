from random import choice, random

tails, heads = 0, 0

for i in range (1000):
    coin_flip = choice(['heads', 'tails'])
    if coin_flip == 'heads':
        heads = heads + 1
    else:
        tails = tails + 1

print('Heads:', heads)
print('Tails:', tails)