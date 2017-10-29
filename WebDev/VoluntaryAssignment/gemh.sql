-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2016 at 08:12 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gemh`
--
CREATE DATABASE IF NOT EXISTS `gemh` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gemh`;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `File_Name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `File_Status` int(11) NOT NULL,
  `File_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`File_id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`File_Name`, `File_Status`, `File_id`) VALUES
('uploads-01-1129801000-STATUTES6_20150121123405.pdf', 1, 6),
('uploads-01-1177101000-ΣΥΣΤΑΣΗ.pdf', 3, 7),
('uploads-01-1315701000-STATUTES6_20121115112053.pdf', 1, 8),
('uploads-01-1353201000-2015_04_08_10_22_52.pdf', 1, 9),
('uploads-01-1802001000-29-1-15.pdf', 2, 10),
('uploads-01-1883201000-STATUTES6_20120925045705.pdf', 1, 11),
('uploads-01-1940101000-STATUTES6_20121115112637.pdf', 1, 12),
('uploads-01-1996101000-STATUTES6_20121119124639.pdf', 1, 13),
('uploads-01-202001000-2014_09_22_17_36_34.pdf', 1, 14),
('uploads-01-2226701000-STATUTES6_20120925101406.pdf', 2, 15),
('uploads-01-2232401000-STATUTES6_20121228030022.pdf', 1, 16),
('uploads-01-225401000-STATUTES6_20121101031036.pdf', 1, 17),
('uploads-01-230701000-K.pdf', 1, 18),
('uploads-01-230901000-STATUTES6_20120925121003.pdf', 1, 19),
('uploads-01-236701000-STATUTES6_20141024013949.pdf', 1, 20),
('uploads-01-239601000-11.pdf', 1, 21),
('uploads-01-241901000-STATUTES6_20121113015249.pdf', 1, 22),
('uploads-01-2453401000-STATUTES6_20140528112345.PDF', 2, 23),
('uploads-01-2540701000-STATUTES6_20121108014206.pdf', 1, 24),
('uploads-01-254101000-STATUTES6_20150727015125.pdf', 1, 25),
('uploads-01-266801000-72852.pdf', 1, 26),
('uploads-01-2743401000-STATUTES6_20121101045710.pdf', 1, 27),
('uploads-01-277201000-STATUTES6_20121115021358.pdf', 1, 28),
('uploads-01-2777501000-167571.pdf', 1, 29),
('uploads-01-2781601000-STATUTES6_20121105065808.pdf', 1, 30),
('uploads-01-2816401000-9.pdf', 1, 31),
('uploads-01-281801000-STATUTES6_20121002033434.pdf', 1, 32),
('uploads-01-2823301000-STATUTES6_20120926032746.pdf', 1, 33),
('uploads-01-283501000-17.pdf', 1, 34),
('uploads-01-290701000-STATUTES6_20120919014841.pdf', 1, 35),
('uploads-01-2975901000-STATUTES6_20121113030100.pdf', 1, 36),
('uploads-01-3198101000-STATUTES6_20120919112751.pdf', 1, 37),
('uploads-01-321201000-STATUTES6_20121224115938.pdf', 1, 38),
('uploads-01-327801000-STATUTES6_20120927043716.pdf', 1, 39),
('uploads-01-329201000-STATUTES6_20121008103815.pdf', 1, 40),
('uploads-01-329301000-STATUTES6_20121212073740.pdf', 1, 41),
('uploads-01-334801000-10.pdf', 1, 42),
('uploads-01-3439901000-STATUTES6_20140606055402.pdf', 1, 43),
('uploads-01-3458401000-STATUTES6_20121003110234.pdf', 1, 44),
('uploads-01-3459901000-STATUTES6_20121120075728.pdf', 1, 45),
('uploads-01-346901000-STATUTES6_20121213033246.pdf', 1, 46),
('uploads-01-3570301000-STATUTES6_20120925100919.pdf', 1, 47),
('uploads-01-3627401000-STATUTES6_20120927020904.pdf', 1, 48),
('uploads-01-363801000-STATUTES6_20120925042322.pdf', 1, 49),
('uploads-01-3692201000-STATUTES6_20130117125344.pdf', 1, 50),
('uploads-01-3699501000-STATUTES6_20121205064520.pdf', 1, 51),
('uploads-01-372201000-STATUTES6_20120905123709.pdf', 1, 52),
('uploads-01-372401000-STATUTES6_20121101052104.pdf', 1, 53),
('uploads-01-3730601000-STATUTES6_20120913023925.pdf', 1, 54),
('uploads-01-3784101000-STATUTES6_20121017114827.pdf', 1, 55),
('uploads-01-379701000-STATUTES6_20120911023648.pdf', 1, 56),
('uploads-01-383401000-STATUTES6_20121102050846.pdf', 1, 57),
('uploads-01-390701000-STATUTES6_20120919013953.pdf', 1, 58),
('uploads-01-392601000-STATUTES6_20140412102615.pdf', 1, 59),
('uploads-01-394301000-STATUTES6_20121101115824.pdf', 1, 60),
('uploads-01-4112401000-STATUTES6_20121212032152.pdf', 1, 61),
('uploads-01-413401000-STATUTES6_20140311112359.pdf', 1, 62),
('uploads-01-416401000-STATUTES6_20121220044700.pdf', 1, 63),
('uploads-01-4203801000-STATUTES6_20130116024949.pdf', 1, 64),
('uploads-01-4309901000-STATUTES6_20140416033202.pdf', 1, 65),
('uploads-01-4497901000-STATUTES6_20121029032858.pdf', 1, 66),
('uploads-01-4539501000-STATUTES6_20121107095914.pdf', 1, 67),
('uploads-01-4597001000-STATUTES6_20121123031247.pdf', 1, 68),
('uploads-01-4853001000-STATUTES6_20140211121436.pdf', 1, 69),
('uploads-01-5274001000-38.pdf', 1, 70),
('uploads-01-5274201000-39.pdf', 1, 71),
('uploads-01-5493501000-STATUTES6_20150320093512.pdf', 1, 72),
('uploads-01-550701000-STATUTES6_20160405114957.pdf', 1, 73),
('uploads-01-5553301000-STATUTES6_20130604024124.pdf', 1, 74),
('uploads-01-5631301000-219324.pdf', 1, 75),
('uploads-01-564201000-STATUTES6_20121115044148.pdf', 1, 76),
('uploads-01-568201000-STATUTES6_20120927052037.pdf', 1, 77),
('uploads-01-580701000-STATUTES6_20120926024918.pdf', 1, 78),
('uploads-01-583501000-STATUTES6_20121210110928.pdf', 1, 79),
('uploads-01-592601000-STATUTES6_20140524013312.pdf', 1, 80),
('uploads-01-597301000-STATUTES6_20140711010858.pdf', 1, 81),
('uploads-01-604701000-STATUTES6_20121130022516.pdf', 1, 82),
('uploads-01-6288401000-2014_05_24_11_45_29.pdf', 1, 83),
('uploads-01-6343601000-STATUTES6_20121008110258.pdf', 1, 84),
('uploads-01-637201000-20.pdf', 1, 85),
('uploads-01-637401000-KAT.pdf', 1, 86),
('uploads-01-6406501000-231439.pdf', 1, 87),
('uploads-01-713201000-KLEOS.pdf', 1, 88),
('uploads-01-7149401000-STATUTES6_20121121100544.pdf', 1, 89),
('uploads-01-725301000-STATUTES6_20120919034413.pdf', 1, 90),
('uploads-01-7304301000-29.pdf', 1, 91),
('uploads-01-740401000-STATUTES6_20121206010829.pdf', 1, 92),
('uploads-01-7700901000-STATUTES6_20120903034104.pdf', 1, 93),
('uploads-01-814501000-STATUTES6_20120917062742.pdf', 1, 94),
('uploads-01-8419601000-STATUTES6_20121024025720.pdf', 1, 95),
('uploads-01-915601000-STATUTES6_20120908014838.pdf', 1, 96),
('uploads-99-121746199000-STATUTES6_20120912104102.pdf', 1, 97),
('uploads-99-123247299000-STATUTES6_20121114090905.pdf', 1, 98),
('uploads-99-134724899000-STATUTES6_20150526080138.PDF', 1, 99),
('037f2756-4d97-408c-b230-619b4d0cf14b.pdf', 3, 100),
('1.pdf', 1, 101),
('13092011 Memorandum of Association.pdf', 1, 102),
('2015_12_18_12_21_24.pdf', 1, 103),
('306aec46-e48f-440c-ae3a-92ee373ba82e.pdf', 1, 104),
('9.pdf', 1, 105),
('b70b2990-9f02-4aef-b87b-04b1494b4a46.pdf', 1, 106),
('ΚΑΤΑΣΤΑΤΙΚΟ_ΑΦΟΙ_Μ_ΠΑΥΛΙΔΗ.pdf', 1, 107),
('ΛΑΜΠΟΡ.pdf', 1, 108);

-- --------------------------------------------------------

--
-- Table structure for table `filesform`
--

DROP TABLE IF EXISTS `filesform`;
CREATE TABLE IF NOT EXISTS `filesform` (
  `File_id` int(11) NOT NULL,
  `formJsonData` varchar(2000) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  PRIMARY KEY (`File_id`),
  KEY `UserName` (`UserName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filesform`
--

INSERT INTO `filesform` (`File_id`, `formJsonData`, `UserName`) VALUES
(10, '{"eponimia":"BRINKS''S HERMES CASH & VALUABLE SERVICES ΑΝΩΝΥΜΗ ΕΤΑΙΡΕΙΑ-ΙΔΙΩΤΙΚΗ ΕΠΙΧΕΙΡΗΣΗ ΠΑΡΟΧΗΣ ΥΠΗΡΕΣΙΩΝ ΑΣΦΑΛΕΙΑΣ","title":"BRINKS - ΕΡΜΗΣ S.A","members":"0","edra":"Δήμοε Αθηναίων, Κορυτσάς 52-Βοτανικός","duration":"40","purpose":"Η παροχή υπηρεσιών όσον αφορά τη μεταφορά με οποιοδήποτε μέσο της, προστασία, εισαγωγή, εξαγωγή, αποθήκευση, φύλαξη, παροχή ασφαλείας, εκτελωνισμό συναλλάγματος, νομίσματος, ράβδων χρυσού, πολύτιμων μετάλλων και λίθων, αντικειμένων τέχνης, οποιουδήποτε είδους τιμαλφών, πολύτιμων αγαθών και εγγράφων. Η διανομή,συλλογή εμπορεύσιμων αγαθών για λογαριασμό τρίτων.\\nβ. Η επιτήρηση ή φύλαξη κινητών ή ακινήτων περιουσιακών αγαθών και Εγκαταστάσεων.\\nγ. Η προστασία φυσικών προσώπων.\\nδ. Η προστασία θεαμάτων,εκθέσεων, συνεδρίων, διαγωνισμών και αθλητικών εκδηλώσεων.\\nε. Ο έλεγχος ασφάλειας πληρωμάτων, επιβατών, χειραποσκευών, αποσκευών, φορτίου και ταχυδρομικού υλικού σε αερολιμένες και λιμένες, καθώς και ο έλεγχος προσβασης στους χώρους και, εν γένει, στις εγκαταστάσεις αυτών μετά απο έγκριση της αρμόδιας αεροπορικής ή λιμενικής αρχής. \\nστ. Η συνοδεία για την ασφαλή κίνηση οχημάτων που μεταφέρουν ογκώδη ή βαρέα αντκείμενα, με ειδικά οχήματα που φέρουν στοιχεία επισήμανσης, σύμφωνα με την περίπτωση ε'' της παραγράφου 1 του άρθρου 4 του Ν.2518/1997.\\nζ. Η συνοδεία αθλητικών αποστολών για την ασφαλή μετακίνηση τους. \\nη. Η εκπόνηση μελετών και ο σχεδιασμός μέτρων για την ασφαλή πραγματαοποίηση των παραπάνω δραστηριοτήταν των περιπτώσεων β εως ζ της παρούσας παραγράφου. Όλες οι εμπορικές ή οικονομικές δραστηριότητς που αφορουν τους ως άνω σκοπούς στην Ελλάδα.","shares":"4000","sharePrice":"10000","capital":"40000000","currency":"1","fileID":"10"}', 'user'),
(15, '{"notary":"asdfghj","members":"0","currency":"1","fileID":"15"}', 'user'),
(23, '{"formNumber":"3437/1997","eponimia":"ΒΑΛΕΝΑ Aνύνημη, Εμπορική και Βιομηχανική Εταιρεία ειδών υγιεινής, οικοδομικών υλικών και τροφίμων","title":"VALENA S.A","members":"0","edra":"Δήμος Περιστερίου Αττικής, Παπαρρηγοπούλου 40-42","duration":"30","purpose":"1) Οι εισαγωγές εξαγωγές αντιπροσωπείες και γενικά α) η εμπορία ειδών υγιεινής, πλακίδίων, ειδών κρουνοποϊας και γενικά η εμπορία παντός ειδούς προϊόντων συναφών με τα άνω είδη. Επίσης η εμπορία επίπλων μπάνιου-κουζίνας και γενικά ειδών που αφορούν εξοπλισμό κατοικίας συμπεριλαμβανομένων και ηλεκτρικών ειδών. β) Εισαγωγές και εξαγωγές και εμπορία φρούτων, τροφίμων νοπών και κατεψυγμένν, ξηρών καρπών, ποτών, καφέ και ελαιοσπόρου.\\nγ) Εισαγωγές και εξαγωγές και εμπορία ξυλείας, σιδήρου, χρωμάτων καθώς και ειδών εσωτερικής διακόσμησης, όπως ταπετσαρίες, μοκέτες, υφάσματα επίπλων, λευκά είδη. Επίσης η εμπορία δομικών υλικών όπως υαλότουβλων, πυρότουβλων.\\n2. Για την επίτευξη του σκοπού της η εταιρία μπορεί να συνεργάζεται με οποιδήποτε φυσικό η νομικό πρόσωπο με οποιοδήποτε τρόπο. Να αγοράζει, μισθώνει, οποιαδήποτε μεταφορικά μέσα, να αγοράζει και μισθώνει ακίνητα, να αγοράζει και πωλεί χρεώγραφα.","shares":"36000","sharePrice":"1000","capital":"36000000","currency":"1","fileID":"23"}', 'user'),
(100, '{"formNumber":"39.310/14.7.2014","eponimia":"AEGEAN FARM ΑΝΩΝΥΜΗ ΕΤΑΙΡΕΊΑ","title":"AEGEAN FARM S.A","notary":"ΓΕΩΡΓΙΟς Θ. ΣΤΕΦΑΝΑΚΟΣ","members":"3","owner1Name":"Λουκάς Παπαθανασίου","owner1ID":"ΑΕ 982577","owner1AFM":"033681468","owner1DOY":"Χαλκίδας","owner2Name":"Αλέξιος Κοτσιώρης","owner2ID":"Χ 5222205","owner2AFM":"033465970","owner2DOY":"Χαλκίδας","owner3Name":"Νέστορας Κανέλλας","owner3ID":"ΑΒ224110","owner3AFM":"047948990","owner3DOY":"Λάρισας","edra":"ΕΛ ΒΕΝΙΖΕΛΟΥ 24, ΔΗΜΟΣ ΝΕΑΣ ΙΩΝΙΑΣ","duration":"50","purpose":"Η παραγωγή, μεταποίηση, εμπόριο και εξαγωγή αγροτικών προϊόντων.","shares":"2400","sharePrice":"10","capital":"24000","currency":"2","fileID":"100"}', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `UserName` varchar(100) CHARACTER SET utf8 NOT NULL,
  `PassWord` varchar(500) NOT NULL,
  `EmailAddress` varchar(50) NOT NULL,
  PRIMARY KEY (`UserName`),
  UNIQUE KEY `EmailAdress` (`EmailAddress`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserName`, `PassWord`, `EmailAddress`) VALUES
('user', '$2y$10$VF0M6TYDip8oIpK37fnMEOjsNvHWbiUnOAsXAP5AkwGHeTLZ2vska', 'useruser@mail.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `filesform`
--
ALTER TABLE `filesform`
  ADD CONSTRAINT `filesform_ibfk_1` FOREIGN KEY (`File_id`) REFERENCES `files` (`File_id`),
  ADD CONSTRAINT `filesform_ibfk_2` FOREIGN KEY (`UserName`) REFERENCES `users` (`UserName`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
