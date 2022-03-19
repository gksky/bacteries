import locale
locale.setlocale(locale.LC_ALL, '')
'ru_RU.UTF-8'

red = int(input('Enter count of red: '))
green = int(input('Enter count of green: '))
t = int(input('Enter ticks: '))

for x in range(t):
  tr = red * 4 + green * 2
  tg = red * 3 + green * 5
  red = tr
  green = tg

print('Red:  ', locale.format_string('%d', red, grouping=True))
print('Green:', locale.format_string('%d', green, grouping=True))
  