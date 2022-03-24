-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 18 mars 2022 à 15:50
-- Version du serveur : 5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wf3_php_intermediaire_severine`
--
CREATE DATABASE IF NOT EXISTS `wf3_php_intermediaire_severine` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `wf3_php_intermediaire_severine`;

-- --------------------------------------------------------

--
-- Structure de la table `advert`
--

CREATE TABLE `advert` (
  `id` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `type` enum('vente','location') NOT NULL,
  `price` varchar(255) NOT NULL,
  `reservation_message` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `advert`
--

INSERT INTO `advert` (`id`, `title`, `description`, `postal_code`, `city`, `type`, `price`, `reservation_message`) VALUES
(1, 'Location appartement 1 pièce 17 m²\r\nParis 19e 75019', 'DESCRIPTIF DE CET APPARTEMENT À LOUER DE 1 PIÈCE ET 17 M²\r\nSTUDIO 17m² PARIS 19EME. proche buttes Chaumont et métro 7bis BOLIVAR tous commerces immeuble avec double digicode studio de 17m² situé au 3ème étage comprenant: une entrée, une pièce principale, une cuisine, une salle d\'eau avec WC\r\n\r\nChauffage individuel électrique\r\nplacards de rangement\r\nfenêtre pvc double vitrage', '75019', 'Paris 19éme', 'location', '674', 'RESERVER'),
(2, 'Location appartement 2 pièces 40 m²\r\nParis 7e 75007 (Champ de Mars)', 'DESCRIPTIF DE CET APPARTEMENT À LOUER DE 2 PIÈCES ET 40 M²\r\nDERNIER ETAGE - VUE TOUR EIFFEL. Gros caillou, au 5ème et dernier étage avec ascenseur d\'un immeuble ancien de la rue Surcouf , appartement de 40m2, comprenant une entrée, un séjour avec cuisine américaine équipée, une chambre avec un grand placard et une salle de bain avec WC.Loyer charges comprises : 1572 euros.Magnifique vue Tour Eiffel.', '75007', 'Paris 7éme', 'location', '1574', NULL),
(3, 'Location appartement 4 pièces 53 m²\r\nParis 10e 75010 (Porte Saint-Martin - Paradis)', 'DESCRIPTIF DE CET APPARTEMENT À LOUER DE 4 PIÈCES ET 53 M²\r\nCITYA PECORARI\r\nPARIS 10 T4 54m²\r\n\r\nÀ louer : venez découvrir cet appartement 4 pièces de 53,49 m², à PARIS (75010).\r\nIl se situe dans un immeuble ancien. Cet appartement est composé de trois chambres et d\'une cuisine aménagée. Il inclut également une salle de bains. La résidence est équipée d\'un chauffage individuel alimenté au gaz. Cet appartement T4 est en bon état général.\r\nL\'appartement se trouve dans la commune de Paris.', '75010', 'Paris 10éme', 'location', '1678', 'RESERVER'),
(4, 'Location appartement 2 pièces 30 m²\r\nAuvers-sur-Oise 95430', 'DESCRIPTIF DE CET APPARTEMENT À LOUER DE 2 PIÈCES ET 30 M²\r\nF2 en duplex. L\'adresse V2L vous propose ce charmant appartement entièrement refait à neuf comprenant:\r\nune kitchenette, un séjour; une salle d\'eau, une chambre en mezzanine.\r\nune place de stationnement privative.', '95430', 'Auvers-sur-Oise', 'location', '670', NULL),
(5, 'Location Maison 5 pièces 100 m²\r\nAuvers-sur-Oise 95430', 'DESCRIPTIF DE CET MAISON À LOUER DE 5 PIÈCES ET 100 M²\r\nF5 en duplex. L\'adresse V2L vous propose ce charmant appartement entièrement refait à neuf comprenant:\r\nune kitchenette, un séjour; une salle d\'eau, une chambre en mezzanine.\r\nune place de stationnement privative.', '95430', 'Auvers-sur-Oise', 'location', '1600', 'RESERVER'),
(6, 'Location Maison 4 pièces 80 m²\r\nSannois 95110', 'DESCRIPTIF DE CET MAISON À LOUER DE 4 PIÈCES ET 80 M²\r\nF4. L\'adresse V2L vous propose ce charmant appartement entièrement refait à neuf comprenant:\r\nune kitchenette, un séjour; une salle d\'eau, une chambre en mezzanine.\r\nune place de stationnement privative.', '95110', 'Sannois', 'location', '1950', NULL),
(7, 'Location appartement 3 pièces 60 m²\r\nSannois 95110', 'DESCRIPTIF DE CET APPARTEMENT À LOUER DE 3 PIÈCES ET 60 M²\r\nF3. L\'adresse V2L vous propose ce charmant appartement entièrement refait à neuf comprenant:\r\nune kitchenette, un séjour; une salle d\'eau, une chambre en mezzanine.\r\nune place de stationnement privative.', '95110', 'Sannois', 'location', '1200', NULL),
(8, 'Location Atelier 4 pièces 85 m²\r\nParis 75017', 'DESCRIPTIF DE CET ATELIER À LOUER DE 4 PIÈCES ET 85 M²\r\nF4. L\'adresse V2L vous propose ce charmant appartement entièrement refait à neuf comprenant:\r\nune kitchenette, un séjour; une salle d\'eau, une chambre en mezzanine.\r\nune place de stationnement privative.', '75017', 'Paris 17éme', 'location', '2160', NULL),
(9, 'Location Boutique de 60m²\r\nParis 75009', 'DESCRIPTIF DE CETTE BOUTIQUE À LOUER DE 60 M²\r\nL\'adresse V2L vous propose ce charmant appartement entièrement refait à neuf comprenant:\r\nune kitchenette, un séjour; une salle d\'eau, une chambre en mezzanine.\r\nune place de stationnement privative.', '75009', 'Paris 9éme', 'location', '1788', 'RESERVER'),
(10, 'Location appartement 4 pièces 70 m²\r\nArgenteuil 95100', 'DESCRIPTIF DE CET APPARTEMENT À LOUER DE 4 PIÈCES ET 70 M²\r\nF4. L\'adresse V2L vous propose ce charmant appartement entièrement refait à neuf comprenant:\r\nune kitchenette, un séjour; une salle d\'eau, une chambre en mezzanine.\r\nune place de stationnement privative.', '95100', 'Argenteuil', 'location', '1500', NULL),
(11, 'Vente appartement 4 pièces 70 m²\r\nArgenteuil 95100', 'DESCRIPTIF DE CET APPARTEMENT À VENDRE DE 4 PIÈCES ET 70 M²\r\nF4. L\'adresse V2L vous propose ce charmant appartement entièrement refait à neuf comprenant:\r\nune kitchenette, un séjour; une salle d\'eau, une chambre en mezzanine.\r\nune place de stationnement privative.', '95100', 'Argenteuil', 'vente', '256 000', NULL),
(12, 'Vente Maison 6 pièces 120 m²\r\nAuvers-sur-Oise 95430', 'DESCRIPTIF DE CET MAISON À VENDRE DE 6 PIÈCES ET 120 M²\r\nF6. L\'adresse V2L vous propose ce charmant appartement entièrement refait à neuf comprenant:\r\nune kitchenette, un séjour; une salle d\'eau, une chambre en mezzanine.\r\nune place de stationnement privative.', '95430', 'Auvers-sur-Oise', 'vente', '421 794', 'RESERVER'),
(13, 'Vente Maison 4 pièces 80 m²\r\nSannois 95110', 'DESCRIPTIF DE CET MAISON À VENDRE DE 4 PIÈCES ET 80 M²\r\nF4. L\'adresse V2L vous propose ce charmant appartement entièrement refait à neuf comprenant:\r\nune kitchenette, un séjour; une salle d\'eau, une chambre en mezzanine.\r\nune place de stationnement privative.', '95110', 'Sannois', 'vente', '221 794', NULL),
(14, 'Vente Appartement 3 pièces 56 m²\r\nParis 75009', 'DESCRIPTIF DE CET MAISON À VENDRE DE 3 PIÈCES ET 56 M²\r\nF3. L\'adresse V2L vous propose ce charmant appartement entièrement refait à neuf comprenant:\r\nune kitchenette, un séjour; une salle d\'eau, une chambre en mezzanine.\r\nune place de stationnement privative.', '75009', 'Paris 9éme', 'vente', '426 200', 'RESERVER'),
(15, 'Vente Appartement 2 pièces 36 m²\r\nParis 75002', 'DESCRIPTIF DE CET MAISON À VENDRE DE 3 PIÈCES ET 56 M²\r\nF3. L\'adresse V2L vous propose ce charmant appartement entièrement refait à neuf comprenant:\r\nune kitchenette, un séjour; une salle d\'eau, une chambre en mezzanine.\r\nune place de stationnement privative.', '75002', 'Paris 2éme', 'vente', '394 721', NULL),
(16, 'Vente Appartement 1 pièces 10 m²\r\nParis 75010', 'DESCRIPTIF DE CET MAISON À VENDRE DE 3 PIÈCES ET 56 M²\r\nF3. L\'adresse V2L vous propose ce charmant appartement entièrement refait à neuf comprenant:\r\nune kitchenette, un séjour; une salle d\'eau, une chambre en mezzanine.\r\nune place de stationnement privative.', '75010', 'Paris 10éme', 'vente', '185 000', NULL),
(17, 'Vente Appartement 1 pièces 15 m²\r\nParis 75010', 'DESCRIPTIF DE CET MAISON À VENDRE DE 3 PIÈCES ET 56 M²\r\nF3. L\'adresse V2L vous propose ce charmant appartement entièrement refait à neuf comprenant:\r\nune kitchenette, un séjour; une salle d\'eau, une chambre en mezzanine.\r\nune place de stationnement privative.', '75010', 'Paris 10éme', 'vente', '172 300', 'RESERVER'),
(18, 'Vente Appartement 1 pièces 9 m²\r\nParis 75011', 'DESCRIPTIF DE CET MAISON À VENDRE DE 3 PIÈCES ET 56 M²\r\nF3. L\'adresse V2L vous propose ce charmant appartement entièrement refait à neuf comprenant:\r\nune kitchenette, un séjour; une salle d\'eau, une chambre en mezzanine.\r\nune place de stationnement privative.', '75011', 'Paris 11éme', 'vente', '126 900', NULL),
(19, 'Vente Appartement 2 pièces 20 m²\r\nParis 75019', 'DESCRIPTIF DE CET MAISON À VENDRE DE 3 PIÈCES ET 56 M²\r\nF3. L\'adresse V2L vous propose ce charmant appartement entièrement refait à neuf comprenant:\r\nune kitchenette, un séjour; une salle d\'eau, une chambre en mezzanine.\r\nune place de stationnement privative.', '75019', 'Paris 19éme', 'vente', '269 800', NULL),
(20, 'Vente Appartement 5 pièces 100 m²\r\nParis 75016', 'DESCRIPTIF DE CET MAISON À VENDRE DE 3 PIÈCES ET 56 M²\r\nF3. L\'adresse V2L vous propose ce charmant appartement entièrement refait à neuf comprenant:\r\nune kitchenette, un séjour; une salle d\'eau, une chambre en mezzanine.\r\nune place de stationnement privative.', '75016', 'Paris 16éme', 'vente', '756 033', NULL),
(21, 'Location Maison 2 pièces 45 m² Sannois 95110', 'Je suis l\'annonce ajouté', '75010', 'Paris 10éme', 'location', '540', NULL),
(22, 'Location Maison 2 pièces 45 m² Sannois 95110', 'Je suis l\'annonce ajouté', '75010', 'Paris 10éme', 'location', '540', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `advert`
--
ALTER TABLE `advert`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
