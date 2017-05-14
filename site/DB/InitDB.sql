USE Drugstore

INSERT INTO Users (lastname, firstname, username, password, mail)
VALUES
('Ducobu', 'Alexandre', 'admin', SHA2('+%#5Test1¨*§', 512), 'admin@drugstore.be'),
('Ducobu', 'Alexandre', 'alDuc', SHA2('+%#5Test1¨*§', 512), 'alduc@gmail.com'),
('Tata', 'Titi', 'Toto', SHA2('+%#5tutu3¨*§', 512), 'toto@gmail.com');

INSERT INTO Medicines (name, dosage, contraindications, noticeLink)
VALUES
('Alka-Seltzer comprimés effervescents', '324 mg', "Evitez la consommation d’alcool lorsque vous prenez Alka-Seltzer.<br>Si vous êtes enceinte ou que vous allaitez, si vous pensez être enceinte ou planifiez une grossesse, demandez conseil à votre médecin ou pharmacien avant de prendre ce médicament.<br>Informez votre médecin ou pharmacien si vous utilisez, avez récemment utilisé ou pourriez utiliser tout autre médicament.", 'http://bijsluiters.fagg-afmps.be/DownloadLeafletServlet?id=112829'),
('Buscopan comprimés pelliculés', '20 mg', "N’utilisez pas ce médicament chez les enfants de moins de 6 ans sans consulter votre médecin.<br>Ne pas utiliser pendant la grossesse ni la période d’allaitement.<br>Buscopan provoque parfois des troubles de la vision et des étourdissements.", 'http://bijsluiters.fagg-afmps.be/DownloadLeafletServlet?id=140047'),
('Dafalgan comprimés', '500 mg', "La prise de boissons alcoolisées pendant le traitement est fortement déconseillée.<br>La prise de médicaments anti-inflammatoires et d'anti-acides en même temps que SEDERGINE doit être évitée.<br>SEDERGINE doit être évité pendant les trois premiers mois de la grossesse, et au cours des trois derniers mois.", 'http://bijsluiters.fagg-afmps.be/DownloadLeafletServlet?id=118764'),
('Imodium gélules', '2 mg', "Vous ne pouvez administrer Imodium à des enfants de moins de 6 ans que sur ordonnance et sous la supervision d’un médecin.<br>Si vous êtes enceinte ou que vous allaitez, si vous pensez être enceinte ou planifiez une grossesse, demandez conseil à votre médecin ou pharmacien avant de prendre ce médicament.", 'http://bijsluiters.fagg-afmps.be/DownloadLeafletServlet?id=151300'),
('Medica comprimés', '5 mg;1 mg', "Adressez-vous à votre médecin ou pharmacien avant d’utiliser Medica comprimés pour la gorge.<br>N’utilisez pas ce médicament chez des enfants de moins de 6 ans.<br>Si vous êtes enceinte ou que vous allaitez, si vous pensez être enceinte ou planifiez de contracter une grossesse, demandez conseil à votre médecin ou pharmacien avant d’utiliser ce médicament.", 'http://bijsluiters.fagg-afmps.be/DownloadLeafletServlet?id=219294'),
('Sedergine comprimés effervescents', '325 mg; 500mg; 1 g', "La posologie doit être réduite chez les patients qui consomment beaucoup d’alcool.<br>En cas de grossesse, demandez conseil à votre médecin avant de prendre tout médicament.<br>DAFALGAN 500 mg peut être pris pendant les derniers mois de la grossesse.", 'http://bijsluiters.fagg-afmps.be/DownloadLeafletServlet?id=118997'),
('Sinutab comprimés', '500 mg;60 mg', "Le produit doit être utilisé avec prudence en cas d’atteinte des reins et/ou du foie (dans de tels cas, il est conseillé de réduire la dose) ainsi que d’affection cardiaque.<br>Si vous êtes enceinte ou que vous allaitez, si vous pensez être enceinte ou planifiez une grossesse, demandez conseil à votre médecin ou à votre pharmacien avant de prendre ce médicament.", 'http://bijsluiters.fagg-afmps.be/DownloadLeafletServlet?id=120972');

INSERT INTO Lists (user_id, medicine_id)
VALUES
(2, 2),
(2, 3),
(3, 1),
(3, 5),
(3, 7);
