class QuickSort:
  def __init__(self):
    self.list = []

  def push(self, newData):
    if newData != None:
      self.list.append(newData)
      return
    return

  def quick_sort(self):
    self.list = self.quick_sort_rercurse(self.list)
    return

  def quick_sort_rercurse(self, list):
    if len(list) == 0:
      return []

    referenceItem = list[0]
    lowerThanReference = []
    biggerThanReference = []
    equalThanReference = []
    for i in range(len(list)):
      if list[i] < referenceItem:
        lowerThanReference.append(list[i])
      elif list[i] > referenceItem:
        biggerThanReference.append(list[i])
      else:
        equalThanReference.append(list[i])

    print(lowerThanReference)
    print(biggerThanReference)

    lowerThanReference = self.quick_sort_rercurse(lowerThanReference)
    biggerThanReference = self.quick_sort_rercurse(biggerThanReference)

    list = lowerThanReference + equalThanReference +biggerThanReference

    return list



  def __str__(self):
    list = self.list
    text = ''
    for item in list:
      text += f'{item}\n'
    return text


test = QuickSort()
test.push(2)
test.push(3)
test.push(4)
test.push(1)
test.push(8)
test.push(4)
test.push(7)
test.push(0)
print(test)

test.quick_sort()
print(test)
