languages = ["Pyhton", "Java", "JS", "C#", "HTML/CSS"]

for x in languages:
	if x == "JS":
		continue
	print(x)

i = 1
while i <= 6:
	print(i)
	i += 1

counter = lambda y : y + 1

print(counter(12))