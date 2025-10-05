# PatternEntrainement

[![PHP](https://img.shields.io/badge/PHP-8.0%2B-blue.svg)](https://www.php.net/)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](LICENSE)
[![Build](https://img.shields.io/badge/build-passing-brightgreen.svg)]()
[![GitHub issues](https://img.shields.io/github/issues/Dylan-Groux/PatternEntrainement.svg)](https://github.com/Dylan-Groux/PatternEntrainement/issues)
[![GitHub stars](https://img.shields.io/github/stars/Dylan-Groux/PatternEntrainement.svg)](https://github.com/Dylan-Groux/PatternEntrainement/stargazers)

---

## 🧪 PatternEntrainement

Bienvenue sur mon dépôt d’expérimentation des **design patterns** en PHP !  
Ce projet me sert de laboratoire pour tester, comprendre et comparer différents patterns de conception orientés objet.

---

## 🚀 Objectif

- Explorer et implémenter les principaux design patterns (Iterator, Strategy, Repository, etc.)
- Comprendre leurs avantages, limites et cas d’usage en PHP
- Garder une base stable (`main`) et une branche par pattern/test

---

## 📦 Structure du projet

```
.
├── src/
│   ├── Entity/
│   │   └── Data.php
│   └── Services/
│       ├── CommandManager.php
│       ├── NumberIterator.php
│       └── NumberIteratorHelper.php
├── main.php
├── composer.json
└── README.md
```

---

## 🛠️ Exécution

1. **Cloner le repo**
   ```sh
   git clone https://github.com/Dylan-Groux/PatternEntrainement.git
   cd PatternEntrainement
   ```

2. **Installer les dépendances**
   ```sh
   composer install
   ```

3. **Lancer l’application CLI**
   ```sh
   php main.php
   ```

---

## 🧩 Patterns expérimentés

- [x] Iterator
- [ ] Strategy
- [ ] Repository
- [ ] Observer
- [ ] Singleton
- [ ] Factory
- [ ] ...et d’autres à venir !

Chaque pattern est développé sur une branche dédiée, puis fusionné dans `main` si pertinent.

---

## 💡 Contribuer

Ce dépôt est avant tout personnel, mais toute suggestion ou PR est la bienvenue pour enrichir la réflexion ou proposer des variantes !

---

## 📄 Licence

MIT

---

## 👤 Auteur

[Dylan Groux](https://github.com/Dylan-Groux)

---