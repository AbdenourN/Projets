def est_base(c):
    """
    On vérifie si le caractère correspond à l'un des caractère d'une base de l'ADN.
    """
    
    if c == "A" or c == "T" or c == "G" or c =="C":
        return True
    else:
        return False

def est_adn(s):
    """
    On vérifie si la chaîne de caractère est uniquement composé de caractère qui correspond
    aux caractère d'une base de l'ADN en utilisant la fonction de la question 1.
    """
    i = 0
    while i < len(s):
        if est_base(s[i])== False:
            return False
        i += 1
    return True


def arn(adn):
    """
    On modifie le caractère T en U d'une chaîne de caractère d'une base de l'ADN pour trouver l'ARN 
    en vérifiant si la chaîne de caractère est valide en utilisant les deux fonctions précédentes.
    """
    if est_adn(adn) == True:
        arn = adn.replace("T", "U")
    else:
        return None
    return arn


def arn_to_codons(arn):
    """
    A chaque fois que le programme compte 3 caractères dans la chaîne de caractère, le tableau prend 
    les 3 premiers caractères et continue jusqu'au bout de la chaîne.
    """
    tableau = []
    chaine = ""
    i = 0
    while i < len(arn):
        chaine += arn[i]
        if (i+1) % 3 == 0 and i != 0:
            tableau.append(chaine)
            chaine = ""
        i += 1
    return tableau


def load_dico_codons_aa(filename):
    fichier = open (filename)
    strjson = fichier.read()
    fichier.close()
    acide_aminé = loads(strjson)
    return acide_aminé



def codons_stop(dico):
    """
    On fait une première boucle pour répéter la boucle imbriqué par rapport au nombre de codons donnés
    et la boucle imbriqués vérifie si le codon donné est égal à un codon dans le dico et si non, la 
    boucle imbriqué s'arrête et le tableau prend la valeur du codon.
    """
    dic = list(acide_aminé)
    i = 0
    j = 0
    tableau = []
    while i < len(dico):
        while j < len(dic):
            if dic[j] == dico[i]:
                j += len(dic) 
            elif j == 59:
                tableau.append(dico[i])
            j += 1
        i += 1
        j = 0
        
    return tableau


def codons_to_aa(codons, dico):
    """
    On prend le premier codon donné et on vérifie si il est dans le dictionnaire des codons. Si il y est,
    on arrête la boucle, met sa valeur dans le tableau et on prend le prochain codon et si il n'y est pas,
    on arrête la boucle et retourne le tableau
    """
    i = 0
    tableau = []
    tableau2 = []
    while i < len(codons):
        tableau2.append(codons[i])
        if codons_stop(codons) == tableau2:
            i = len(codons)
        else:
            tableau.append(dico[codons[i]])
            tableau2 = []
            i += 1
                                
    return tableau


def nextIndice(tab, ind, elements):
    """
    On fait une boucle imbriqué pour pouvoir vérifier chaque éléments du tableau et si un élément du
    tableau tab correspond à l'un des éléments du tableau elements, on regarde si l'ind est égal
    à l'indice de l'emplacement de l'élément si oui on retourne i sinon on recommence jusqu'a trouver
    le bonne indice
    """
    i = 0
    while i < len(tab):
        y = 0 
        while y < len(elements):
            if tab[i] == elements[y]:
                if ind <= i:
                    return i
            y += 1
        i += 1
    return len(tab)

def decoupe_sequence(seq, start, stop):
    """
    On fait une boucle imbriqué pour pouvoir vérifier chaque éléments du tableau et si un élément du
    tableau correspond a un élément du tableau start on lance une boucle qui vérifie si l'un des 
    éléments suivants correspond à un élément du tableau stop tout en prenant les éléments dans un
    autre tableau, et si il correspond, on arrete la boucle et on continue jusqu'à la fin du tableau
    """
    i = 0
    tab = []
    while i < len(seq):
        y = 0 
        while y < len(start):
            if seq[i] == start[y]:
                tab2 = []
                j = 0
                while j < 1:
                    i += 1
                    z = 0
                    while z < len(stop):
                        if seq[i] == stop[z]:
                            tab.append(tab2)
                            j += 1
                        z += 1
                    if j == 0: 
                        tab2.append(seq[i])
            y += 1
        i += 1
    return tab


def codons_to_seq_codantes(codons, dico):
    """
    On utilise la fonction précédente avec l'aide d'une fonction de la première partie pour pouvoir
    découper plus facilement la séquence
    """
    return decoupe_sequence(codons, ["AUG"], codons_stop(codons))


def seq_codantes_to_seq_aas(seq_codantes, dico):
    """
    On utilise la fonction précédente pour transformer plus les codons en séquence codantes et ensuite
    on fait une boucle pour pouvoir remplacer chaque éléments en leur acides aminés
    """
    cod = codons_to_seq_codantes(seq_codantes, dico)
    i = 0 
    tab = []
    while i < len(cod):
        temp = codons_to_aa(cod[i], dico)
        tab.append(temp)
        i +=1 
    return tab


def adn_encode_molecule(adn, dico, molecule):
    """
    On transforme l'adn en arn, puis en codons, puis en en acide aminé grâce aux fonctions précédentes   
    et on compare avec la molécule
    """
    ARN = arn(adn)
    codons = arn_to_codons(ARN)
    acide = seq_codantes_to_seq_aas(codons, dico)
    i = 0
    while i < len(acide):
        if acide[i] == molecule:
            return True
        i += 1
