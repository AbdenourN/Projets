def test_est_base():
    assert est_base("A") == True
    assert est_base("c") == False
    assert est_base("R") == False
    print("Test unitaire : OK")

test_est_base()

def test_est_adn():
    assert est_adn("AC") == True
    assert est_adn("ATC") == True
    assert est_adn ("TAGF") == False
    print ("Test unitaire : OK")

test_est_adn()

def test_arn():
    assert arn("ATGTCAAA") == "AUGUCAAA"
    assert arn("TTAGCA") == "UUAGCA"
    assert arn("GAACA") == "GAACA"
    print("Test unitaire : OK")
    
test_arn()

def test_arn_to_codons():
    assert arn_to_codons("CGUAAUGC") == ["CGU", "AAU"]
    assert arn_to_codons("CGUAAU") == ["CGU", "AAU"]
    assert arn_to_codons("AACGUCC") == ["AAC", "GUC"]
    assert arn_to_codons("CGAA") == ["CGA"]
    print("Test unitaire : OK")

test_arn_to_codons()

def test_codons_stop():
    assert codons_stop(["CGU", "AAU", "UAA", "GGG", "CGU"]) == ["UAA"]
    assert codons_stop(["CGU", "AUU", "GCG"]) == []
    assert codons_stop(["CGA", "GGU", "AGA", "GAA", "CAU"]) == ["AGA"]
    print("Test unitaire : OK")
    
test_codons_stop()

def test_codons_to_aa():
    assert codons_to_aa(["CGU", "AAU", "UAA", "GGG", "CGU"], acide_aminé) == ["Arginine", "Asparagine"]
    assert codons_to_aa(["CGU", "AAU", "CGU"], acide_aminé) == ["Arginine", "Asparagine", "Arginine"]
    assert codons_to_aa(["CUU", "CCA", "GAA", "AGU"], acide_aminé) == ["Leucine", "Proline","Glutamic acid", "Serine"]
    print("Test unitaire : OK")
    
test_codons_to_aa()

def test_nextIndice():
    assert nextIndice(["bonjour", "hello", "buongiorno", "ciao", "bye"], 1,["hello", "bye"]) == 1
    assert nextIndice(["coucou", "hello", "bonsoir", "salut", "bye"], 2,["bonsoir", "salut"]) == 2
    assert nextIndice(["salutation", "hallo", "hola", "au revoir", "bye"], 5,["hello", "bye"]) == 5
    print("Test unitaire : OK")
    
test_nextIndice()

def test_decoupe_sequence():
    assert decoupe_sequence(["val1", "début", "val2", "val3", "end", "val4", "fin", "begin", "val5", "fin", "val6"], ["début", "begin"], ["fin", "end"]) == [['val2', 'val3'], ['val5']]
    assert decoupe_sequence(["val1", "val2", "val3", "end","début", "val4", "fin", "begin", "val5", "val6", "fin"], ["début", "begin"], ["fin", "end"]) == [['val4'], ['val5', 'val6']]
    assert decoupe_sequence(["1", "2", "3", "commencement", "4", "terminus", "5", "début", "6", "7","fin"], ["commencement" , "début"], ["fin", "terminus"]) == [['4'], ['6', '7']]
    print("Test unitaire : OK")
    
test_decoupe_sequence()

def test_codons_to_seq_codantes():
    assert codons_to_seq_codantes(["CGU", "UUU", "AUG", "CGU", "AUG", "AAU", "UAA", "AUG", "GGG", "CCC",  "CGU", "UAG", "GGG"], acide_aminé) == [['CGU', 'AUG', 'AAU'], ['GGG', 'CCC', 'CGU']]
    assert codons_to_seq_codantes(["CGU", "UUU", "CGU", "AUG", "AAU", "GGG", "CCC",  "CGU", "UAG", "GGG"], acide_aminé) == [['AAU', 'GGG', 'CCC', 'CGU']]
    assert codons_to_seq_codantes(["CGU", "UUU", "CGU", "AAU", "GGG", "CCC",  "CGU", "UAG", "GGG"], acide_aminé) == []
    print("Test unitaire : OK")
    
test_codons_to_seq_codantes()

def test_seq_codantes_to_seq_aas():
    assert seq_codantes_to_seq_aas(["CGU", "UUU", "AUG", "CGU", "AUG", "AAU", "UAA", "AUG", "GGG", "CCC",  "CGU", "UAG", "GGG"], acide_aminé) == [['Arginine', 'Methionine', 'Asparagine'], ['Glycine', 'Proline', 'Arginine']]
    assert seq_codantes_to_seq_aas(["CGU", "UUU", "CGU", "AUG", "AAU", "GGG", "CCC",  "CGU", "UAG", "GGG"], acide_aminé) == [['Asparagine', 'Glycine', 'Proline', 'Arginine']]
    assert seq_codantes_to_seq_aas(["CGU", "UUU", "CGU", "AAU", "GGG", "CCC",  "CGU", "UAG", "GGG"], acide_aminé) == []
    print("Test unitaire : OK")
    
test_seq_codantes_to_seq_aas()

def test_adn_encode_molecule():
    assert adn_encode_molecule("CGTTTTATGCGTATGAATTAAATGGGGCCCCGTTAGGGG", acide_aminé, ["Glycine", "Proline", "Arginine"]) == True
    assert adn_encode_molecule("CGTTTTCGTAATTAAATGGGGCCCCGTTAGGGG", acide_aminé, ["Glycine", "Proline", "Arginine"]) == True
    assert adn_encode_molecule("CGTTTTCGTAATTAAGGGCCCCGTTAGGGG", acide_aminé, ["Glycine", "Proline", "Arginine"]) == None
    print("Test unitaire : OK")
    
test_adn_encode_molecule()
