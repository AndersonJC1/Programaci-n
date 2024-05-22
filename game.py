import pygame
import random
import sys

# Inicializar Pygame
pygame.init()

# Configuración de la pantalla
WIDTH, HEIGHT = 800, 600
screen = pygame.display.set_mode((WIDTH, HEIGHT))
pygame.display.set_caption("Juego Básico")

# Colores
WHITE = (255, 255, 255)
BLACK = (0, 0, 0)
RED = (255, 0, 0)

# Clase para el personaje
class Player(pygame.sprite.Sprite):
    def __init__(self):
        super().__init__()
        self.image = pygame.Surface((50, 50))
        self.image.fill(RED)
        self.rect = self.image.get_rect()
        self.rect.center = (WIDTH // 2, HEIGHT // 2)

    def update(self):
        # Control de movimiento
        keys = pygame.key.get_pressed()
        if keys[pygame.K_LEFT]:
            self.rect.x -= 5
        if keys[pygame.K_RIGHT]:
            self.rect.x += 5
        if keys[pygame.K_UP]:
            self.rect.y -= 5
        if keys[pygame.K_DOWN]:
            self.rect.y += 5

# Clase para los obstáculos
class Obstacle(pygame.sprite.Sprite):
    def __init__(self):
        super().__init__()
        self.image = pygame.Surface((30, 30))
        self.image.fill(BLACK)
        self.rect = self.image.get_rect()
        self.rect.x = random.randint(0, WIDTH - self.rect.width)
        self.rect.y = random.randint(0, HEIGHT - self.rect.height)
        self.speedy = random.randint(1, 5)

    def update(self):
        # Movimiento del obstáculo
        self.rect.y += self.speedy
        if self.rect.top > HEIGHT:
            self.rect.y = 0
            self.rect.x = random.randint(0, WIDTH - self.rect.width)
            self.speedy = random.randint(1, 5)

# Crear grupos de sprites
all_sprites = pygame.sprite.Group()
obstacles = pygame.sprite.Group()
player = Player()
all_sprites.add(player)

# Generar obstáculos
for i in range(8):
    obstacle = Obstacle()
    all_sprites.add(obstacle)
    obstacles.add(obstacle)

# Reloj del juego
clock = pygame.time.Clock()

# Bucle principal del juego
running = True
while running:
    # Mantener el bucle funcionando a la velocidad correcta
    clock.tick(30)

    # Manejo de eventos
    for event in pygame.event.get():
        if event.type == pygame.QUIT:
            running = False

    # Actualizar
    all_sprites.update()

    # Detección de colisiones entre el jugador y los obstáculos
    hits = pygame.sprite.spritecollide(player, obstacles, False)
    if hits:
        running = False

    # Renderizar
    screen.fill(WHITE)
    all_sprites.draw(screen)
    pygame.display.flip()

pygame.quit()
sys.exit()
