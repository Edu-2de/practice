class Automovel():
    def __init__(self, motor, marca, modelo):
        self.motor = motor
        self.marca = marca
        self.modelo = modelo

    def exibir(self):
        print(f'{self.motor} {self.marca} {self.modelo}')

automovel1 = Automovel('m2', 'm3', 'm4')
automovel1.exibir()


automovel2 = Automovel('motor' , )
