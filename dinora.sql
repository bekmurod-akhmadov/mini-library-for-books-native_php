-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 25 2023 г., 14:13
-- Версия сервера: 5.7.29
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dinora`
--

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `order_by` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `title`, `link`, `position`, `order_by`, `parent`, `status`) VALUES
(36, 'Kitoblar', '/', 1, 10, 0, 1),
(37, 'Maktab darsliklari', '/', 1, 20, 0, 1),
(38, 'Foydali sahifalar', '/', 1, 30, 0, 1),
(39, 'yana', '/', 1, 40, 0, 1),
(40, 'Jahon adabiyoti', '?controller=news_category&id=2', 1, 10, 36, 1),
(41, 'O\'zbek adabiyoti', '?controller=news_category&id=3', 1, 20, 36, 1),
(42, 'Detektiv Kitoblar', '?controller=news_category&id=4', 1, 30, 36, 1),
(45, 'Lug\'atlar', '?controller=news_category&id=6', 1, 60, 36, 1),
(46, 'murojat uchun', '	?controller=murojat_uchun', 1, 10, 39, 1),
(47, 'muallif haqida', '?controller=muallif_haqida', 1, 20, 39, 1),
(49, '5-sinf ', '?controller=news_category&id=7', 1, 10, 37, 1),
(50, '6-sinf', '?controller=news_category&id=9', 1, 20, 37, 1),
(51, '7-sinf ', '?controller=news_category&id=10', 1, 30, 37, 1),
(52, '8-sinf', '?controller=news_category&id=11', 1, 40, 37, 1),
(53, '9-sinf', '?controller=news_category&id=12', 1, 50, 37, 1),
(54, '10-sinf', '?controller=news_category&id=13', 1, 60, 37, 1),
(55, '11-sinf', '?controller=news_category&id=14', 1, 60, 37, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `seen_count` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual` tinyint(4) NOT NULL DEFAULT '0',
  `files` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `category_id`, `body`, `created_date`, `updated_date`, `status`, `seen_count`, `image`, `tags`, `actual`, `files`) VALUES
(52, 'Baxtiyor Oila', 'Shayx Muhammad Sodiq Muhammad Yusuf', 3, '<p>Ushbu kitob Islom dinining oilaviy munosabatlarga oid ahkomlarining keng va batafsil sharhi boʼlib, musulmon kishi oilaviy hayotga oid bilishi lozim boʼlgan barcha masalalarni aoʼz ichiga oladi. Kitobda insonga ikki dunyo saodati yoʼlini koʼrsatib bergan Islom dinining baxtli, saodatli oila qurish, er-xotinning huquqlari, burch va majburiyatlari, ota-onaga, qaynota-qaynonaga munosabat, kelin va kuyov tanlash, aqiyqa, farzand tarbiyasi, silai rahm, taloq, idda va shu kabi koʼplab dolzarb mavzulardagi taʼlimotlari orqali bugungi kunda qator muammolar muhokama qilinadi, oyatlar, hadislar hamda salaf solihlarning hayoti misolida musulmonning baxtli oilaviy hayot dasturi koʼrsatib beriladi.</p>', '2022-04-03 07:37:00', '2022-04-03 06:04:51', 1, 100806, 'd41d8cd98f00b204e9800998ecf8427e.jpg', NULL, 1, 'd41d8cd98f00b204e9800998ecf8427e.pdf'),
(53, 'O’TKAN KUNLAR', 'Abdulla Qodiriy', 3, '<p>O‘zbek nasrining gultoji bo‘lgan \"O‘tkan kunlar\" romani har bir asr o‘quvchisi uchun shoh asar bo‘lib qolmoqda. Mehrning, muhabbatning, sadoqatning o‘zbekchasi aynan shu roman orqali qalbimizga yanada chuqurroq singadi. Asar millat kishilarini har qanday holatda ma\'nan va ruhan uyg\'oqlikka chorlab turguvchi qo\'ng\'iroq vazifasini o‘tab kelmoqda.</p>', '2022-04-03 08:07:00', '2022-04-03 06:08:46', 1, 1918, 'd41d8cd98f00b204e9800998ecf8427e.jpg', NULL, 0, 'd41d8cd98f00b204e9800998ecf8427e.pdf'),
(54, 'Kecha va Kunduz', 'Abdulhamid Cho\'lpon', 3, '<p>Kecha va kunduz romaninig o`qigan inson ozi bilmagan holda beixtiyor kitob ichiga shung`ib ketadi. Zebi Zebinisaning hali yosh bo`lishiga qaramasdan boshidan kechirgani odamni yannada qiziqtirib qo`yadi.</p><p>&nbsp;</p>', '2022-04-03 08:15:00', '2022-04-03 07:34:49', 1, 303, 'd41d8cd98f00b204e9800998ecf8427e.jpg', NULL, 0, 'd41d8cd98f00b204e9800998ecf8427e.pdf'),
(55, 'O`tkir Hoshimov', 'Ikki eshik orasi', 3, '<p>O`zbekiston xalq yozuvchisi&nbsp;<strong>O`tkir Hoshimovning</strong>&nbsp;\"<strong>Ikki eshik orasi</strong>\" romani adibning eng salmoqli asarlaridan biri hisoblanadi. Romanda o`zbek xalqining fazilatlari - jumardligi, har qanday vaziyatda ham imonini yo`qotmasligi, mehridaryoligi, teran tuyg`ular, yorqin bo`yoqlarda tasvirlangan.Asarda adib qariyb qirq yillik davrni o`z ichiga olgan bir qancha murakkab taqdirlar misolida o`zbek xalqining urush davridagi hayoti, umr yo`lidagi chigalliklarni mahorat bilan qalamga olgan. Asarda zamonning tuganmas azob toshlariga uchragan, insoniy qadr-qimmatini yo`qotmagan insonlar, o`z taqdirini Vatan taqdiri bilan bog`lagan xalq qismati tasvirlangan. Asarni o`qigan kitobxon ijodkorning o`sha davr ruhini asarda to`liq mujassam ettira olganligiga guvoh bo`ladi.</p>', '2022-04-03 08:23:00', '2022-04-03 06:24:27', 1, 626, 'd41d8cd98f00b204e9800998ecf8427e.jpg', NULL, 0, 'd41d8cd98f00b204e9800998ecf8427e.pdf'),
(56, 'Alkimyogar', 'Paulo Koelo', 2, '<p><i>Kitob mahsulotlarining xarakteristikalari, yetkazib berish shartlari, tashqi ko\'rinishi va rangi haqidagi ma\'lumotlar faqat ma\'lumot uchun mo\'ljallangan va joylashtirilgan paytda mavjud bo\'lgan eng so\'nggi ma\'lumotlarga asoslanadi.</i></p>', '2022-04-03 08:29:00', '2022-04-03 06:29:16', 1, 1714, 'd41d8cd98f00b204e9800998ecf8427e.jpg', NULL, 1, 'd41d8cd98f00b204e9800998ecf8427e.pdf'),
(57, 'Boy ota kambag\'al ota', 'Robert Kiyosaki', 2, '<p>Har kim oʼz farzandiga bilganicha taʼlim-tarbiya beradi. Bu borada hammaning oʼz qarashi bor. Аmmo kelajak kimning yoʼli toʼgʼriroq ekanini, albatta, koʼrsatadi... Mazkur kitobda boy va kambagʼal toifadagi otalarning fikr-mulohazalarini, bu xususdagi tamoyillarini keltirar ekanmiz, siz azizlarda solishtirish imkoni mavjud boʼladi. Xulosani oʼzingiz chiqaring. Kitob sizga manzur boʼladi va yordam beradi, degan umiddamiz.</p>', '2022-05-06 08:33:00', '2022-04-03 06:34:35', 1, 1612, 'd41d8cd98f00b204e9800998ecf8427e.jpg', NULL, 1, 'd41d8cd98f00b204e9800998ecf8427e.pdf'),
(58, 'Cho\'qintirgan Ota ', 'Mario Pyuzo', 2, '<p>Аmerikalik taniqli yozuvchi Mario Pьyuzoning «Sitsiyalik» romanini «Choʼqintirgan ota» asarining davomi deyish mumkin. Unda don Korleonening kichik oʼgʼli Maykl taqdiri toʼgʼrisida hikoya qilinadi. Shuningdek, jasur qahramon, mard yigit Salʼvatore Gilьyanoning hayoti, metin irodasi, koʼplab sarguzashtlari va fojiaviy qismati bayon etiladi.</p><p>&nbsp;</p>', '2022-04-03 08:38:00', '2022-04-03 06:40:01', 0, 224, 'd41d8cd98f00b204e9800998ecf8427e.jpg', NULL, 0, 'd41d8cd98f00b204e9800998ecf8427e.pdf'),
(59, 'Izquvar Puaro ', 'Agata Kristi', 4, '<p>Mashhur ingliz yozuvchisi, \"detektiv qirolichasi\" Аgata Kristining asarlari dunyoning yuzdan ortiq tillariga tarjima qilingan, koʼplari sahnalashtirilgan.</p>', '2022-04-03 08:47:00', '2022-04-03 06:48:06', 1, 303, 'd41d8cd98f00b204e9800998ecf8427e.jpg', NULL, 0, 'd41d8cd98f00b204e9800998ecf8427e.pdf'),
(60, 'Alifbo bo\'yicha qotillik', 'Agata Kristi', 4, '<p>\"Алифбо бўйича қотиллик\" Агата Кристининг энг машҳур романларидан бўлиб, у 1936 йилда нашр қилинган. Асарнинг асосий қаҳрамонлари Эркюль Пуаро, капитан Гастингс ва катта инспектор Джепп. Пуаро хатлар воситасида ўйин бошлаган жиноятчининг изига тушади, унинг имзосида атиги учта илк ҳарф мавжуд: А, Б ва С. Инглиз тилида эса 26 та ҳарф бор. Демак, қотил номлари алифбо тартибида жойлашган ҳарфлар билан бошланадиган жойларда қотиллик содир этишни режалаштирмоқда...</p>', '2022-04-04 08:49:00', '2022-04-03 06:51:43', 1, 1213, 'd41d8cd98f00b204e9800998ecf8427e.jpg', NULL, 0, 'd41d8cd98f00b204e9800998ecf8427e.pdf'),
(61, 'Matematika 5', 'B. Q. HAYDAROV', 7, '<p>5- sinflar uchun Maktab darsligi</p>', '2022-04-03 17:45:00', '2022-04-03 16:04:51', 1, 115, 'd41d8cd98f00b204e9800998ecf8427e.jpg', NULL, 0, 'd41d8cd98f00b204e9800998ecf8427e.pdf'),
(64, 'Botanika', 'O\'.Pratov F.Azimova', 7, '<p>O‘zbekiston Respublikasi Xalq ta’limi vazirligi umumiy o‘rta ta’lim maktablarining 5-sinf o‘quvchilari uchun darslik sifatida tavsiya etgan To‘ldirilgan va qayta ishlangan to‘rtinchi nashri</p>', '2022-04-04 17:52:00', '2022-04-03 15:52:58', 1, 122, 'd41d8cd98f00b204e9800998ecf8427e.jpg', NULL, 0, 'd41d8cd98f00b204e9800998ecf8427e.pdf'),
(65, 'Geografiya', 'P. G‘ulomov,  R. Qurbonniyozov', 7, '<p>Aziz o‘quvchilar! Siz bu yildan boshlab yangi fan — «Geografiya»ni o‘rganasiz. Bizning buyuk bobokalonlarimiz geografiyani yaxshi bilishgan, shuning uchun ham ushbu fan haqida qimmatli va qiziqarli ma’lumotlarni yozib qoldirganlar.</p>', '2022-04-05 17:56:00', '2022-04-03 15:56:30', 1, 114, 'd41d8cd98f00b204e9800998ecf8427e.jpg', NULL, 0, 'd41d8cd98f00b204e9800998ecf8427e.pdf'),
(66, 'Informatika 5', ' D. KAMOLITDINOVA', 7, '<p>Hurmatli o‘quvchilar! Fan va texnika, ayniqsa, axborot texnologiyalari shiddat bilan rivojlanib borayotgan ushbu davrda har bir inson o‘zining hayotida muhim bo‘lgan bilim va ko‘nikmalarga ega bo‘lishi zarur.</p>', '2022-04-04 17:59:00', '2022-04-03 16:00:17', 1, 101, 'd41d8cd98f00b204e9800998ecf8427e.jpg', NULL, 0, 'd41d8cd98f00b204e9800998ecf8427e.pdf'),
(67, 'Ingliz tili', 'Urinboy Hoshimov, Hurmay Ganiyeva', 7, '<p>5-sinflar uchun ingliz tilidn yangilanda,to\'ldirilgan maktab darsligi</p>', '2022-04-04 18:01:00', '2022-04-03 16:02:34', 1, 222, 'd41d8cd98f00b204e9800998ecf8427e.jpg', NULL, 0, 'd41d8cd98f00b204e9800998ecf8427e.pdf'),
(68, 'Ona tili', 'N. MAHMUDOV, A. NURMONOV, A. SOBIROV', 7, '<p>Aziz o‘quvchilar! Sizlar 1–4-sinflarda «Ona tili» fanining dastlabki tushunchalari haqida ma’lumotlar oldingiz. Tovush va harf o‘rtasidagi farqlarni ajrata olish ko‘nikmasiga ega bo‘ldingiz, bo‘g‘in, so‘z, so‘z birikmasi, gap to‘g‘risidagi ilk saboqlarni tingladingiz. Lekin bilasizlarmi, o‘zbek tilidan yaxshi xabardor bo‘lish uchun bu bilimlar kifoya qilmaydi. Siz kelgusida yanada ko‘proq mehnat qilishingiz, sabot va chidam bilan ona tilining sir-asrorlarini o‘rganishingiz lozim. Saba</p>', '2022-04-04 18:05:00', '2022-04-03 16:06:08', 1, 100, 'd41d8cd98f00b204e9800998ecf8427e.jpg', NULL, 0, 'd41d8cd98f00b204e9800998ecf8427e.pdf'),
(69, 'Adabiyot  5  1-qism', 'S. AHМЕDОV, B. QОSIМОV, R. QO‘ChQОRОV, Sh. RIZAYЕV', 7, '<p>Aziz o‘quvchi! Siz bu yildаn «Adаbiyot» dаrsini аlоhidа fan sifatida o‘qiy bоshlаyapsiz. Endi Alishеr Nаvоiy, Zаhiriddin Мuhаmmаd Bоbur kаbi nоmlаri butun jаhоngа yoyilgаn buyuk bоbоlаrimizning hаyot yo‘llаri bilаn kеngrоq tаnishаsiz. Asаrlаridаn bаhrаmаnd bo‘lаsiz. Оzоdlik vа mustаqillik yo‘lidа jоnlаrini fidо etgаn Abdullа Qоdiriy, Abdullа Avlоniy vа Usmоn Nоsirlаrning Vаtаn vа millаt hаqidаgi o‘tli sаtrlаri qаlbingizgа cho‘g‘ tаshlаshigа ishоnаmiz. Bugungi kunning аrdоqli shоirlаri Abdullа Оripоv vа Erkin Vоhidоvlаrning хаlqimiz shоnli tаriхidаn hikоya qilib, pоrlоq kеlаjаgidаn bаshоrаt etuvchi go‘zаl shе’r-u dоstоnlаri, o‘ylаymizki, sizning qаlbingizgа hаm zаvq vа surur bаg‘ishlаydi</p>', '2022-04-04 18:09:00', '2022-04-03 16:09:39', 1, 225, 'd41d8cd98f00b204e9800998ecf8427e.png', NULL, 0, 'd41d8cd98f00b204e9800998ecf8427e.pdf'),
(70, 'Adabiyot 5 2-qism', 'S. AHМЕDОV, B. QОSIМОV, R. QO‘ChQОRОV, Sh. RIZAYЕV', 7, '<p>Aziz o‘quvchi! Siz bu yildаn «Adаbiyot» dаrsini аlоhidа fan sifatida o‘qiy bоshlаyapsiz. Endi Alishеr Nаvоiy, Zаhiriddin Мuhаmmаd Bоbur kаbi nоmlаri butun jаhоngа yoyilgаn buyuk bоbоlаrimizning hаyot yo‘llаri bilаn kеngrоq tаnishаsiz. Asаrlаridаn bаhrаmаnd bo‘lаsiz. Оzоdlik vа mustаqillik yo‘lidа jоnlаrini fidо etgаn Abdullа Qоdiriy, Abdullа Avlоniy vа Usmоn Nоsirlаrning Vаtаn vа millаt hаqidаgi o‘tli sаtrlаri qаlbingizgа cho‘g‘ tаshlаshigа ishоnаmiz. Bugungi kunning аrdоqli shоirlаri Abdullа Оripоv vа Erkin Vоhidоvlаrning хаlqimiz shоnli tаriхidаn hikоya qilib, pоrlоq kеlаjаgidаn bаshоrаt etuvchi go‘zаl shе’r-u dоstоnlаri, o‘ylаymizki, sizning qаlbingizgа hаm zаvq vа surur bаg‘ishlаydi</p>', '2022-04-04 18:10:00', '2022-04-03 16:11:09', 1, 12, 'd41d8cd98f00b204e9800998ecf8427e.png', NULL, 0, 'd41d8cd98f00b204e9800998ecf8427e.pdf'),
(71, 'Tasviriy Sanat', 'R. Rajabov', 7, '<p>Tasviriy san’atning ifodaviy vositalari va ifodaviy tilini tushunish va undan tasviriy-ifodaviy faoliyatda o‘rinli foydalanish muhim ahamiyatga ega.</p>', '2022-04-03 18:48:00', '2022-04-03 16:49:21', 1, 102, 'd41d8cd98f00b204e9800998ecf8427e.jpg', NULL, 0, 'd41d8cd98f00b204e9800998ecf8427e.pdf'),
(72, 'Matematika 6', 'M. A. MIRZAAHMEDOV, A. A. RAHIMQORIYEV', 9, '<p>Aziz o‘quvchi! Ona yurtimiz O‘zbekiston jahon ilm-u fani, madaniyatiga yuzlab buyuk olimlar, shoirlar, davlat arboblari, rassomlarni yetishtirib bergan. Bilingki, siz ularning ezgu ishlari davomchisisiz! Kitobimiz sahifalarida diyorimizning buyuk allomalari ijodidan namunalar joy olgan. Ular asrlar osha siz bilan gaplashadilar – siz ular bilan faxrlaning!</p>', '2022-04-04 14:55:00', '2022-04-04 12:57:32', 1, 521, 'd41d8cd98f00b204e9800998ecf8427e.jpg', NULL, 0, 'd41d8cd98f00b204e9800998ecf8427e.pdf'),
(73, '1', '1', 13, '<p>\"11111111111</p><p>\"</p><p>\"</p><p>\"</p><p>\"</p>', '2022-05-07 15:23:00', '2022-04-04 13:27:29', 1, 111, 'd41d8cd98f00b204e9800998ecf8427e.png', NULL, 0, 'd41d8cd98f00b204e9800998ecf8427e.pdf'),
(74, 'test', 'test', 2, '<p>dddddddddddddddddddddddddddddddddd</p>', '2022-05-18 18:01:00', '2022-05-17 16:02:18', 1, 1, 'd41d8cd98f00b204e9800998ecf8427e.jpg', NULL, 0, 'd41d8cd98f00b204e9800998ecf8427e.pdf');

-- --------------------------------------------------------

--
-- Структура таблицы `news_category`
--

CREATE TABLE `news_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news_category`
--

INSERT INTO `news_category` (`id`, `title`, `status`) VALUES
(2, 'Jahon adabiyoti', 1),
(3, 'O\'zbek adabiyoti', 1),
(4, 'Detektiv Kitoblar', 1),
(6, '	Lug\'atlar', 1),
(7, '5-sinf', 1),
(9, '6-sinf', 1),
(10, '7-sinf', 1),
(11, '8-sinf', 1),
(12, '9-sinf', 1),
(13, '10-sinf', 1),
(14, '11-sinf', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `quote`
--

CREATE TABLE `quote` (
  `id` int(11) NOT NULL,
  `title` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `quote`
--

INSERT INTO `quote` (`id`, `title`, `author`, `status`) VALUES
(1, '                                                                                                                                          Bilimdonlar suzi bordir bu bobda :\r\n«Bilimdon gurda-yu, ilmi kitobda!»\r\nАgar yolbiz esang, xamdam kitobdir,\r\nBilim subxidagi nur xam kitobdur.\r\n                                                                                                                      ', 'Abdurahmon Jomiy', 1),
(3, '-Biz o\'zimizni kashf qilishimiz kerak. Mahsulotlarimizni boshqalar emas, balki biz almashtiradigan ekanligimizga ishonch hosil qilishimiz kerak.', 'Bill Gates', 1),
(4, 'Odamning ulug’vorligi uning bo’yi bilan o’lchanmaganidek, xalqning ulug’ligi ham, uning soni bilan o’lchanmaydi, yagona o’lchovi-uning aqliy kamoloti va axloqiy barkamolligidir.\r\n                                      ', 'Dinora Akramovna', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `social`
--

INSERT INTO `social` (`id`, `link`, `class`, `order_by`, `status`) VALUES
(18, 'telegram', 'fab fa-telegram', 10, 1),
(19, 'instagram', 'fab fa-instagram', 20, 1),
(20, 'tik tok', 'fab fa-tiktok', 34, 1),
(21, 'skype', 'fa-brands fa-skype', 10, 1),
(22, 'wifi', 'fa-solid fa-wifi', 40, 1),
(23, 'telegram', 'fab fa-telegram', 10, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `avatar`, `status`, `email`) VALUES
(1, 'Bekmurod', '23b36ea4f70670ae377a591fdc03d36a9bebb481', 'admin.jpg', 1, 'ahmadovbekmurod1321@gmail.com'),
(9, 'adminchikk', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'd41d8cd98f00b204e9800998ecf8427e.jpg', 1, 'admin@gamil.com'),
(10, 'user2333', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'd41d8cd98f00b204e9800998ecf8427e.jpg', 0, 'user@mail.ru'),
(11, 'qwerty', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'd41d8cd98f00b204e9800998ecf8427e.jpg', 1, 'xqwerty@gmail.com'),
(12, 'Aziza', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'd41d8cd98f00b204e9800998ecf8427e.jpg', 0, 'aziza@gmail.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT для таблицы `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `quote`
--
ALTER TABLE `quote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
