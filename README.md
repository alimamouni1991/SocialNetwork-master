# SocialNetwork
Social Network with Symfony 4 .
Réseau social permettant d'échanger à travers des posts et des commentaires sur divers sujets.

# Fonctionnalités:
- Créer un compte sécurisé.
- Créer des posts avec des tags.
- Liker un posts
- Poster un commentaire.
- Rechercher un post par Tag.

# Usage
Prerequisite : PHP7 , Composer details installation : https://symfony.com/doc/current/setup.html

On root folder run : `composer install`

to start the application run : `php bin/console server:start`

details : https://symfony.com/doc/4.0/setup/built_in_web_server.html

# DB

Enter details of your databe connection in the .env file with the variable DATABASE_URL. See example `DATABASE_URL= mysql://root:@127.0.0.1:3306/dbname`

# Présentation:
Vous pouvez consulter la Présentation complète de mon projet que j'ai réalisé durant ma soutenance:
- https://github.com/salitim/SocialNetwork/blob/master/Projet%205.pdf






- ------------------------------------------------------------------------------  WINDEV -----------------------------------------------------------------------------
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// structure qui permet de modifier plusieur ficher
strPrix est une Structure
		ref est une chaîne
		prix est un monétaire
		qte est un monétaire
	FIN
	lstPrix est un tableau de strPrix
	noeux est un strPrix
	FOR i = 1 TO TableOccurrence(Table)
		noeux:prix = Table.PrixHT[i]
		noeux:qte = Table.QteFact[i]
		noeux:ref = Table.Reference[i]
		TableauAjoute(lstPrix,noeux)
	END
	_numCom est une chaîne 
	
	_totHT est un monétaire
	HLitRecherchePremier(BLFacturéF,NumFacture,chp_NumFact)
	WHILE HTrouve(BLFacturéF)
		HLitRecherche(BonLivraisonF,NumBLF,BLFacturéF.NumBLF,hIdentique)
		IF HTrouve(BonLivraisonF) THEN 
			_totHT = 0
			
			HLitRecherchePremier(LigneBLF,NumBLF,BonLivraisonF.NumBLF)
			WHILE HTrouve(LigneBLF)
				pos est un entier = TableauCherche(lstPrix,tcLinéaire,"ref",LigneBLF.Reference)
				SI pos <> -1 ALORS 
					LigneBLF.PrixAchatHT = lstPrix[pos]:prix
					LigneBLF.QteLivre = lstPrix[pos]:qte
					HModifie(LigneBLF)
					_totHT += LigneBLF.PrixAchatHT * LigneBLF.QteLivre
					HLitRecherche(LignedeCommandeF,IDLignedeCommande,LigneBLF.IDLignedeCommande)
					IF HTrouve(LignedeCommandeF) THEN
						LignedeCommandeF.PrixAchatHT = LigneBLF.PrixAchatHT
						LignedeCommandeF.QteLivre = LigneBLF.QteLivre
						_numCom = LignedeCommandeF.NumCommande
						HModifie(LignedeCommandeF)
					END
				FIN
				HLitSuivant(LigneBLF)			
			END
			BonLivraisonF.Tva = cmb_TauxTva
			BonLivraisonF.TotalHT = _totHT
			BonLivraisonF.TotalTTC = _totHT * BonLivraisonF.Tva / 100
			BonLivraisonF.TotalTTC = BonLivraisonF.TotalHT + BonLivraisonF.TotalTTC
			HModifie(BonLivraisonF)
		END
		
		HLitRecherche(CommandeF,NumCommande,_numCom)
		IF HTrouve(CommandeF) THEN
			_totHT = 0
			HLitRecherchePremier(LignedeCommandeF,NumCommande,_numCom)
			WHILE HTrouve(LignedeCommandeF)
				_totHT += LignedeCommandeF.PrixAchatHT * LignedeCommandeF.QteLivre
				HLitSuivant(LignedeCommandeF)
			END
			CommandeF.Tva = cmb_TauxTva
			CommandeF.TotalHT = _totHT
			CommandeF.TotalTTC = _totHT * CommandeF.Tva / 100
			CommandeF.TotalTTC = CommandeF.TotalHT + CommandeF.TotalTTC
			HModifie(CommandeF)
		END
		HLitSuivant(BLFacturéF)
	END

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
changer l'alphabet en arab
ChangeAlphabet( alphabetArabe )

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
visibilite d'un bouton 

SI Contient(user_login,"omar",SansCasse) OR Contient(user_login,"finition",SansCasse) OR Contient(user_login,"mahdi",SansCasse) OR Contient(user_login,"zineb",SansCasse) ALORS
	Table.Prix_Achat..Visible = False
SINON 
	Table.Prix_Achat..Visible = Vrai
FIN

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Importer un ficher Excel 


IdFichierXLS est un entier
//FichierExcel est une chaîne
i,NbLigne,NbColonne est un entier
//FichierExcel="C:\Excel.xls"
FichierExcel est une chaîne

// Ouvre le sélecteur de fichiers
FichierExcel = fSélecteur("", "", "Sélectionnez un fichier Excel Exporter par le logiciel de la paie...", "Tous les fichiers (*.*)" + TAB + "*.*" + RC + ".xls" + TAB + "*.xls", "*.xls")


SI fFichierExiste(FichierExcel) ALORS
	
	//HCréation(AvanceMois)
	
	IdFichierXLS = xlsOuvre(FichierExcel)
	NbLigne=xlsNbLigne(IdFichierXLS)
	//	HOuvre(AvanceMois)
	
	POUR i=2 À NbLigne-1
		SI IdFichierXLS <> -1 ALORS
			mat est un entier
			mat = xlsDonnée (IdFichierXLS,i,1,Vrai)
			HLitRecherche(Employee,Matricule,mat)
			SI HTrouve(Employee) ALORS

				
				SalarierPointer.NomPrenom = Employee.NomPrenom
//				SalarierPointer.Salaire = xlsDonnée (IdFichierXLS,i,31,Vrai)
				SalarierPointer.IDMoisA = idmois
				SalarierPointer.Matricule = xlsDonnée (IdFichierXLS,i,1,Vrai)
				SalarierPointer.NbrHeurs = xlsDonnée(IdFichierXLS,i,3,Vrai)
				HAjoute(SalarierPointer)

			SINON
				SalarierPointer.NomPrenom = xlsDonnée (IdFichierXLS,i,2,Vrai)
				SalarierPointer.Matricule = xlsDonnée (IdFichierXLS,i,1,Vrai)
				SalarierPointer.NbrHeurs = xlsDonnée(IdFichierXLS,i,3,Vrai)
				SalarierPointer.IDMoisA = idmois
				HAjoute(SalarierPointer)
			FIN
			
		FIN	
	FIN	
SINON
	Erreur("Le fichier Excel Clients.xls n'existe pas")
FIN
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
executer une requete qui rempli une table avec des filtres


SI Sélecteur1 = 1 ALORS
Requête_ProduitFiniRapide.ParamactifON = 1
SINON SI Sélecteur1 = 2 ALORS
Requête_ProduitFiniRapide.ParamactifON = 0
SINON
Requête_ProduitFiniRapide.ParamactifON = Null
FIN


SI sai_designation <> "" ALORS
	Requête_ProduitFiniRapide.ParamDesignation = sai_designation
SINON
	Requête_ProduitFiniRapide.ParamDesignation = Null
FIN

SI Référence <> "" ALORS
	Requête_ProduitFiniRapide.ParamIDProduitFini = Val(Référence)
SINON
	Requête_ProduitFiniRapide.ParamIDProduitFini = Null
FIN

SI societe <> "" ALORS
	Requête_ProduitFiniRapide.ParamNumClient = societe
SINON
	Requête_ProduitFiniRapide.ParamNumClient = Null
FIN
HExécuteRequête(Requête_ProduitFiniRapide)

TableSupprimeTout(Table_ProduitFini)
HLitPremier(Requête_ProduitFiniRapide)
_societe est une chaîne
_societe = ""
WHILE NOT HEnDehors(Requête_ProduitFiniRapide)
	HLitRecherchePremier(Client,NumClient,Requête_ProduitFiniRapide.NumClient)
	SI HTrouve(Client) ALORS
		_societe = Client.Societe
	FIN
	TableAjouteLigne(Table_ProduitFini,Requête_ProduitFiniRapide.IDProduitFini,Requête_ProduitFiniRapide.Designation,Requête_ProduitFiniRapide.Longeur,Requête_ProduitFiniRapide.Largeur,Requête_ProduitFiniRapide.gr,Requête_ProduitFiniRapide.grCouv,Requête_ProduitFiniRapide.NbPages,_societe,Requête_ProduitFiniRapide.optionVernisSelectif,Requête_ProduitFiniRapide.Pelliculage,Requête_ProduitFiniRapide.Recto_Verso,Requête_ProduitFiniRapide.Recto_Verso_Couverture,Requête_ProduitFiniRapide.typeFinition,Requête_ProduitFiniRapide.TypePapier,Requête_ProduitFiniRapide.typePapierCouverture,Requête_ProduitFiniRapide.FormatFini,Requête_ProduitFiniRapide.bob,Requête_ProduitFiniRapide.FT,Requête_ProduitFiniRapide.actifON)
	HLitSuivant(Requête_ProduitFiniRapide)
END

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Imprimer une etat avec parametres

	iConfigure()
	iAperçu(i100) 
	iImprimeEtat(Etat_Fact_Fourn,chp_NumFact,Observations,Chp_Societe,Adresse,DateFacture,chp_NumFact,"Modifier_FactureFourn.Table",cmb_TauxTva)

