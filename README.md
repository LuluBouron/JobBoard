### Objectifs de l'application

Création d’une application de de type job board permettant de publier des offres d’emploi avec:
- Le titre de l’offre
- La description de l’offre
- Le salaire
- Le nom du service
- Une liste de compétences (sous forme de tags)

### Objectifs pédagogiques:
- Renforcer les apprentissages précédents
- Approfonir les connaissances Doctrine avec la gestion des relations entre entités
- Approfondir les connaissances Symfony avec la gestion des formulaires

### Présentation du modèle de données:
Notre modèle de données est composé de 3 entités:
- Offre Service Tag

###  Création des entités
- Créer l'entité Tag :
    > nom, string, 255, not null
- Créer l'entité Service :
    > nom, string, 255, not null
    > telephone, string, 255, not null
    > email, string, 255, not null
- Créer l'entité Offre :
    > nom, string, 255, not null
    > description, text, not null
    > salaire, decimal, 6, 2, not null
    > service, relation, Service, ManyToOne, nullable
    > tags, relation, Tag, manyToMany

### Mise en place de Tailwind CSS (via CDN)

### Création des fixtures
- orm-fixtures
- fakerphp/faker


### Affichage de nos Offres

- #[Route('/', name: 'app_job')]

### Affichage d'une seule offre

- #[Route('/show/{id}', name: 'app_job_show')]

### Création d’un formulaire avec le FormBuilder

- Symfony nous permet de créer des formulaires de manière très simple. Pour cela, nous allons utiliser le composant Form.
- Cela va  permettre de créer des formulaires très rapidement et de manière très sécurisée.
- Création d'un formulaire pour créer une offre. Pour cela, utilisation du FormBuilder.

### Conclusions
- J'ai pu créer un formulaire avec Symfony d'abord manuellement puis avec le 'Builder' au sein du contrôleur
puis en externalisant le formulaire dans un fichier dédié
- J'ai vu comment traiter le formulaire après soumission en respectant les bonnes pratiques de Symfony avec la notion de CSRF

