#Implements Quick Sort

import math


class QuickSort:
  def __init__(self):
    self.list = []

  def push(self, newData):
    if newData != None:
      self.list.append(newData)
      return
    return

  def quick_sort(self):
    list = self.list
    listLength = len(list)

    if listLength <= 1:
      return

    for i in range(listLength):
      for j in range(i + 1, len(listLength)):
        self.quick_sort_rercurse(listLength[i], listLength[j])
    return

  def quick_sort_rercurse(self, firstItem, secondItem, referenceItem):
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
