I had posted a question on Forrst, and it got me wondering how best to go about keeping track of an applications core version and pushing updates ( not using GIT ).

Using git would be ideal if I was the one managing a single web application. Obviously using Git would complicate things for beginner users. But its likely that Extension and Theme developers will be using some form of source control.

I then set off to build a developer portal to manage this versioning.

**Features**

* Contributors can register/login
* They see a list of their public repositories and can hide unrelated repos
* Releases must be tagged v<major>.<minor>.<patch>
* Choose weather they are submitting a theme, or extension
* If a new release has been tagged then the extension can be Versioned


**Benefits**

* All themes and extensions are central
* Privately managed
* Source code is hosted on Github
* Extensions are version


**API Calls**

* get/core/
* get/themes/
* get/themes/{slug}
* get/plugins/
* get/plugins/{slug}
* get/author/{username}

Later on I will collect ratings, statistics such as number of downloads and compatibility. You will also be able to look up all extensions from an author, and search categories.

Depending on demand I may integrate other Public Git Hosting services such as Bitbucket.