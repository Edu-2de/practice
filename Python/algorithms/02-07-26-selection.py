#Implements Selection Sort


class Selection:
  def __init__(self):
    self.list = []

  def push(self, newData):
    if newData != None:
      self.list.append(newData)
      return
    return

  def selection_sort(self):
    list = self.list

    if len(list) <= 1:
      return

    for i in range(len(list)):
      smaller = i
      for j in range(i + 1, len(list)):
        if list[j] < list[smaller]:
          print(f'{list[j]} is smaller than {list[i]}')
          smaller = j
        else:
          print('Nothing')
      list[i], list[smaller] = list[smaller], list[i]
    return


  def __str__(self):
    list = self.list
    text = ''
    for item in list:
      text += f'{item}\n'
    return text


test = Selection()
test.push(2)
test.push(3)
test.push(4)
test.push(1)
test.push(8)
test.push(7)
test.push(0)
test.selection_sort()
print(test)
