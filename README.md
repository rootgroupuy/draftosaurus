# Draftosaurus - Juego de Mesa Digital 🦕

## Descripción del Proyecto
Draftosaurus es una adaptación digital del juego de mesa donde los jugadores gestionan su propio parque de dinosaurios. Desarrollado por Root Group para el Instituto Tecnológico Brazo Oriental (ISBO), este proyecto implementa las mecánicas del juego original en una experiencia interactiva multiplataforma.

## Estructura del Proyecto
```
draftosaurus-project/
├── config/
│   └── settings.json         # Configuraciones de la base de datos
├── database/
│   └── draftosaurus.DB.sql   # Esquema de la base de datos
├── src/
│   ├── app/
│   │   ├── models/           # Lógica de negocio
│   │   └── views/            # Interfaces de usuario
│   └── public/
│       └── assets/           # Recursos estáticos
└── tests/                    # Pruebas unitarias
```

## Requisitos Previos
- PHP 7.4 o superior
- MySQL/MariaDB
- Servidor web (Apache/Nginx)
- Navegador web moderno

## Instalación
1. Clonar el repositorio:
   ```bash
   git clone https://github.com/rootgroupuy/draftosaurus.git
   cd draftosaurus
   ```

2. Configurar la base de datos:
   - Importar el esquema desde `database/draftosaurus.DB.sql`
   - Actualizar las credenciales en `config/settings.json`

3. Configurar el servidor web:
   - Configurar el documento root a la carpeta `src/`
   - Asegurar que PHP tiene permisos de escritura en los directorios necesarios

## Características Principales
- 🎲 Sistema de dados dinámico
- 🦖 Gestión de dinosaurios por jugador
- 🎮 Interfaz multilingüe (ES, EN, DE, PT)
- 📊 Sistema de puntuación y ranking
- 🔄 Mecánicas de drafting implementadas

## Arquitectura del Sistema
### Componentes Principales
- **Dinobolsa**: Gestiona la colección de dinosaurios disponibles
- **Dinomano**: Controla los dinos en mano de cada jugador
- **Dinotablero**: Administra el tablero de juego y las zonas
- **Dinodado**: Implementa la lógica del dado y sus efectos

## Guía de Contribución
1. Fork el repositorio
2. Crear una rama para tu feature: `git checkout -b feature/nueva-caracteristica`
3. Commit los cambios: `git commit -am 'Añade nueva característica'`
4. Push a la rama: `git push origin feature/nueva-caracteristica`
5. Crear un Pull Request

### Convenciones de Código
- Seguir PSR-12 para PHP
- Documentar todas las funciones y métodos
- Mantener el código en ingles para consistencia
- Realizar pruebas unitarias para nuevas características

## Pruebas
Ejecutar las pruebas unitarias:
```bash
php phpunit.phar tests/
```

## Licencia
Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## Equipo
Desarrollado por Root Group:
- [Luciano Moreira]
- [Gerónimo Ruiz]
- [José Moreira]
- [Santiago Lamarca]

## Contacto
Para preguntas o sugerencias, por favor crear un issue en el repositorio o contactar a rootgroup.uy@protonmail.com.

---
© 2025 Root Group - ISBO. Todos los derechos reservados.
