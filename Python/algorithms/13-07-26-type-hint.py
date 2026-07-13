from dataclasses import dataclass, field
from typing import List, Dict

@dataclass
class Aresta:
    id_destino: str
    distancia_km: float
    tempo_minutos: float
    tipo_rua: str

@dataclass
class No:
    id: str
    nome: str
    latitude: float
    longitude: float
    vizinhos: List[Aresta] = field(default_factory=list)

class GrafoMapa:
    def __init__(self):
        self.nos: Dict[str, No] = {}

    def adicionar_no(self, no: No):
        self.nos[no.id] = no

    def obter_vizinhos(self, id_no: str) -> List[Aresta]:
        return self.nos[id_no].vizinhos
