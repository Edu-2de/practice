myList = [0] * 99

def get_hash_index(item):
    hashTotal = 0
    for i, letter in enumerate(item):
        hashTotal += ord(letter) * (31 ** i)
    return hashTotal % len(myList)

def set_item(item):
    index = get_hash_index(item)
    myList[index] = item

def get_item(item):
    index = get_hash_index(item)
    result = myList[index]

    if result != 0:
        return index
    return None

set_item('abelha')
set_item('abelho')

print(f"Índice encontrado: {get_item('abelha')}")
