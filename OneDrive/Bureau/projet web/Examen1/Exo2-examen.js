

var longueurDernierMot = function (s) {
    var i = s.length - 1;
    var longueur = 0;

    // pour ignorer les espaces à la fin
    while (i >= 0 && s[i] === ' ') {
        i--;
    }

    // pour compter les caractères du dernier mot
    while (i >= 0 && s[i] !== ' ') {
        longueur++;
        i--;
    }

    return longueur;
};

console.log(longueurDernierMot("Hello World")); 
console.log(longueurDernierMot(" Bonjour Monsieur le boulanger  "));
console.log(longueurDernierMot("Lauryn")); 
