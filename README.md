## Projet : Monitoring de la salle des serveurs

##### STI2D

##### SIN

#### Contexte : Salle des serveurs du lycée

#### Comment optimiser le fonctionnement des serveurs afin

#### de réduire la consommation énergétique et les coûts de

#### fonctionnement et de maintenance?

```
Situation problème :
```
```
La consommation énergétique et le coût de fonctionnement et de maintenance des réseaux
informatiques sont un enjeu stratégique (démarche « Green IT »).
Un des axes d’action consiste à surveiller les paramètres d’environnement (température,
hygrométrie...) des équipements critiques du réseau (serveurs notamment), afin d’optimiser
les performances du matériel.
```
```
Cahier des charges :
```
```
La température, le degré d’hygrométrie et le taux de CO2 seront mesurés dans la salle des
serveurs.
```
```
Ces paramètres seront affichés sous forme graphique sur un moniteur de la cellule
informatique.
```
```
En cas de dépassement de valeurs critique, une alerte de dysfonctionnement sera générée,
et un message précisant l’origine du problème sera affiché sur le moniteur.
Les seuils d’alerte seront réglables grâce à une IHM, dans le local de la cellule informatique.
```
```
Enfin, pour pouvoir intervenir rapidement (sans avoir à chercher la clé), la salle des serveurs
sera accessible par la saisie d’un code (avec rétro affichage).
```

```
ANALYSER LE BESOIN : (durée 10 h)
```
_Afin de vous approprier le projet, vous devez commencer par effectuer le travail suivant :_

```
1- En fonction du problème proposé, modéliser le fonctionnement du système à partir du
diagramme des cas d’utilisation puis le compléter sous MagicDraw.
```
```
2- En tenant compte du cahier des charges ci-dessus, et de la configuration de la cellule
informatique et de la salle des serveurs, lister toutes les solutions pouvant être envisagées afin
de satisfaire le besoin.
il faudra identifier les grandeurs physiques, et quantifier les valeurs mesurées (par exemple,
quelles peuvent être les valeurs d’hygrométrie ?), et la précision souhaitable.
```
```
3- Compléter le diagramme d’exigences (cahier des charges) de votre système, sous Magicdraw,
afin de répondre au problème posé : il faudra détailler chaque exigence et préciser les
performances attendues (valeurs, précision...).
```
```
4- Proposer un nom « accrocheur » afin de commercialiser votre produit. Vérifier sur le site de
l’INPI (base de données marques : http://bases-marques.inpi.fr/) qu’il n’est actuellement pas
utilisé.
```
```
5- Effectuer un choix des matériels en privilégiant un usage raisonné des ressources et une
démarche de développement durable. Consulter en particulier les normes de sécurité et
réglementation concernant les dispositifs électroniques et la directive RoHs, ainsi que les
recommandations de l’ASHRAE.
http://eco3e.eu/introduction/
https://www.actu-
environnement.com/ae/news/reglement_mode_veille_appareil_electrique_5423.php
```
```
6- Réaliser une analyse du coût global afin d’obtenir un compromis technico-économique de votre
projet. Le budget imposé est de 100€ (la carte Arduino et le shield Ethernet sont fournis par le
lycée).
```
```
7- Identifier les différentes tâches (activités élèves) répondant au cahier des charges.
```
```
8- Répartir les différentes tâches entre les membres de l’équipe et planifier les étapes du projet
(diagramme de Gantt).
```
```
ATTENTION : il est impératif que chacun intervienne sur la totalité de la chaîne
d’information (acquérir, traiter, restituer/communiquer).
```

##### REVUE DE PROJET 1

_Les travaux effectués au cours de cette activité « d’analyse de projet » seront évalués lors de la 1 ère revue
de projet soit :_
1/ Conduite de la revue
Chaque équipe consacre environ 30 à 45 minutes à effectuer sa revue de projet, qui consiste à :

- décrire la problématique ;
- présenter le problème technique à résoudre (cahier des charges) ;
- proposer de façon argumentée les différentes solutions recherchées ;
- justifier le choix d’une solution à privilégier ;
- présenter une étude technico économique (coûts, normes)
- proposer une répartition des tâches ;
- indiquer la planification du projet (diagramme de Gantt).
Pendant ce temps les autres équipes poursuivent leurs travaux en autonomie.
2/ Conclusion de la revue
Il s’agit d’une phase décisionnelle sur l’orientation du projet et la poursuite des travaux. Cette conclusion est
éventuellement différée, et vise à :
- arrêter le choix de solutions à privilégier ;
- arrêter la répartition des tâches → fiche de contrat individuel.
3/ Évaluation
La séance une fois terminée, en dehors de la présence des élèves, le professeur renseigne
les grilles d’évaluation individuelles.

### Évaluation – critères et attendus

```
La définition du système est exprimée correctement A B C D
Attendus :
```
- le besoin est exprime dans un langage clair et précis ; le vocabulaire est précis et technique (et personnel !)
- le besoin est justifié vis a vis des enjeux du développement durable (social, économique, environnemental)
Le cahier des charges est analysé et reformulé A B C D
Les diagrammes sysml sont bien interprétés A B C D
_Attendus :_
- la problématique est clairement présentée
- le cahier des charges est détaillé du point de vue des performances attendues ; le diagramme des exigences est
complété
- Les valeurs attendues sont quantifiées, ainsi que la précision nécessaire
- Le nom donné au projet est argumenté
Une liste non exhaustive de solutions pertinentes est établie A B C D
Le choix de la solution est argumenté A B C D
Les données économiques sont identifiées A B C D
Des constituants sont choisis et justifiés A B C D
_Attendus :_
- l'ensemble des pistes de recherche est présenté
- les critères de choix ou d'élimination d'une solution sont expliqués
- chacune des solutions envisagées est confrontée aux critères technico économiques
Les chemins critiques sont mis en évidence et les dates de
réunions de projet sont fixées A B C D
_Attendus :_
- une planification générale (diagramme de Gantt) est présentée ; elle comprend les tâches et les ressources pour
chacune des phases
- un suivi du planning est présenté ;
- le chemin critique montre les points de vigilance

```
Annexe : légende de l'évaluation
A
```
```
L'ensemble des attendus est présent.
Ils sont présentés de manière approfondie.
Tous les éléments sont justifiés.
B
```
```
L'ensemble des attendus est présent.
Ils sont présentés de manière approfondie.
Ils ne sont pas tous justifiés.
C
```
```
Les attendus ne sont pas tous présentés.
Ils ne sont pas tous abordés de manière approfondie.
Ils ne sont pas tous justifiés.
D
```
```
Les attendus ne sont pas tous présentés.
Ils sont abordés sans profondeur.
Ils ne sont pas justifiés.
```

