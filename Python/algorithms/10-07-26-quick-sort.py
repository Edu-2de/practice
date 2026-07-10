class Nodo:
  def __init__(self,data):
    self.data = data
    self.next = None


class QuickSort:
  def __init__(self):
    self.first = None
    self.last = None

  def push(self, data):
    newNodo = Nodo(data)
    if self.first == None:
      self.first = newNodo
      self.last = newNodo
      return
    self.last.next = newNodo
    self.last = newNodo
    return

  def pop(self):
    self.first = self.first.next
    return

  def __str__(self):
    if self.first == None:
      return
    strings = ''
    actualNodo = self.first
    while actualNodo != None:
      strings += f'nodo: {actualNodo.data}\n'
      actualNodo = actualNodo.next

    return strings

  def sort(self):
    if self.first.next == None:
      return

    self.first = self.sort_rercurse(self.first)
    return

  def sort_rercurse(self, actualNodo):
    if actualNodo == None or actualNodo.next == None:
      return actualNodo

    pivot_val = actualNodo.data

    lowerNodo = Nodo(0)
    middleNodo = Nodo(0)
    higherNodo = Nodo(0)

    initLower = lowerNodo
    initMiddle = middleNodo
    initHigher = higherNodo

    while actualNodo != None:
      if actualNodo.data < pivot_val:
        lowerNodo.next = actualNodo
        lowerNodo = lowerNodo.next
      elif actualNodo.data > pivot_val:
        higherNodo.next = actualNodo
        higherNodo = higherNodo.next
      else:
        middleNodo.next = actualNodo
        middleNodo = middleNodo.next
      actualNodo = actualNodo.next

    lowerNodo.next = None
    higherNodo.next = None
    middleNodo.next = None

    # while initLower:
    #   print(f"low: {initLower.data}")
    #   initLower =initLower.next

    # while initHigher:
    #   print(f"high: {initHigher.data}")
    #   initHigher =initHigher.next

    # print(lowerNodo.data)
    # print(higherNodo.data)

    sortedLower = self.sort_rercurse(initLower.next)
    sortedHigher = self.sort_rercurse(initHigher.next)

    if sortedLower != None:
      temp = sortedLower
      while temp.next != None:
        temp = temp.next

      temp.next = initMiddle.next
      newHead = sortedLower
    else:
      newHead = initMiddle.next

    middleNodo.next = sortedHigher

    return newHead

test = QuickSort()
test.push(1)
test.push(3)
test.push(5)
test.push(4)
print(test)

test.sort()
print(test)
