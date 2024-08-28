<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture ArchiDocs</title>
    <style>
        .logoHeader {
            width: 100px;
            height: 100px;
            margin-right: 20px;
        }

        .logoHeader img {
            width: 120px;
            height: 100%;
        }

        .titreHeader {
            width: 100%;
            text-align: center;
        }

        .titreHeader h1 {
            font-size: 30px;
        }

        .infosArchidocs {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: end;
            margin-top: 20px;
        }

        .infosClient {
            width: 100%;
            display: flex;
            flex-direction: column;
            margin-top: 20px;
            float: right;
        }

        .infosFacture {
            width: 100%;
            display: flex;
            flex-direction: column;
            border: 1px solid black;
            border-radius: 10px;
            padding: 10px;
            /* margin: 0 auto; */
        }

        table {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
        }

        th, td {
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>
<body>
    <div class="infosArchidocs">
        <h1>Facture ArchiDocs</h1>
        <h3>ArchiDocs</h3>
        <h4>Siret : 88871611732114</h4>
    </div>

    <div class="infosFacture">
        <table>
            <thead>
                <tr>
                    <th>Désignation</th>
                    <th>Numéro de facture</th>
                    <th>Date</th>
                    <th>Montant HT unitaire (€)</th>
                    <th>Montant TTC unitaire (€)</th>
                    <th>Quantité</th>
                    <th>TVA</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Achat de stockage dans l'espace ArchiDocs</td>
                    <td><?= $nbFacture[0] + 1?></td>
                    <td><?= date('Y-m-d')?></td>
                    <td>16.00</td>
                    <td>20.00</td>
                    <td>1</td>
                    <td>20%</td>
                </tr>
            </tbody>
        </table>
    </div>

    
    <div class="infosClient">
        <h3>Nom : <?= $userInfos['nom'] ?></h3>
        <h3>Prenom : <?= $userInfos['prenom'] ?></h3>
        <h3>Téléphone : <?= $userInfos['tel'] ?></h3>
        <h3>Adresse : <?= $userInfos['adresse'] ?></h3>
    </div>
</body>

</html>