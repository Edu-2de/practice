

grafo = {}
grafo["home"] = {"school": 10, "streetJohn": 5}
grafo["school"] = {"work": 30, "center": 5}
grafo["center"] = {"work": 20}
grafo["streetJohn"] = {"work": 10}
grafo["work"] = {}

infinity = float("inf")

costs = {
  "school": 10,
  "streetJohn": 5,
  "center": 5,
  "work": infinity
}

parents = {
  "school" : "home",
  "streetJohn": "home",
  "center": "school",
  "work": None,
}

processed = []


def find_no_lower_cost(costs):
  lower_cost = float("inf")
  lower_no_cost = None

  for no in costs:
    cost = costs[no]
    if cost < lower_cost and no not in processed:
      lower_cost = cost
      lower_no_cost = no

  return lower_no_cost

no = find_no_lower_cost(costs)


while no is not None:
  cost = costs[no]
  neighbors = grafo[no]

  for neighbor in neighbors.keys():
    new_cost = cost + neighbors[neighbor]

    if costs[neighbor] > new_cost:
      costs[neighbor] = new_cost
      parents[neighbor] = no

  processed.append(no)

  no = find_no_lower_cost(costs)


final_route = ["work"]
actual_parent = parents["work"]

while actual_parent is not None:
  final_route.append(actual_parent)
  if actual_parent == "home":
    break
  actual_parent = parents[actual_parent]


final_route.reverse()

print(f"Total travel time: {costs['work']} minutes ")
print(f"Best find route:", " -> ".join(final_route))
