-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2016 at 07:59 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `irsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `choosecourse`
--

CREATE TABLE `choosecourse` (
  `courseid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `userid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `semester` int(11) NOT NULL,
  `class` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `room` varchar(8) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `choosecourse`
--

INSERT INTO `choosecourse` (`courseid`, `userid`, `semester`, `class`, `room`) VALUES
('100059', 'ssyu', 1051, 'a', 'm260'),
('130002', 'test1', 1051, 'a', 'a106'),
('13001', 'test1', 1051, 'a', 'a106'),
('130014', 'ssyu', 1042, 'a', 'm241'),
('130041', 'clhung', 1042, 'f', 'm203'),
('130042', 'pyyin', 1042, 'a', 'm213'),
('135055', 'clhung', 1042, 'a', 'm203');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `coursename` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `userid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `chapter` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseid`, `coursename`, `userid`, `chapter`) VALUES
('100059', '資料庫', 'ssyu', ''),
('1051111', '數學', 'test1', ''),
('130001', '國文', 'test1', ''),
('130002', '數學', 'test1', ''),
('130009', '歷史', 'test1', ''),
('130014', '程式設計（下）', 'ssyu', ''),
('130041', '資訊管理專題與個案（上）', 'clhung', ''),
('135055', '管理數學', 'clhung', ''),
('140042', '離散數學', 'pyyin', '');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `questionid` int(11) NOT NULL,
  `courseid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `choice` text COLLATE utf8_unicode_ci NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `userid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `section_name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`questionid`, `courseid`, `question`, `choice`, `answer`, `type`, `userid`, `subject`, `section_name`) VALUES
(1, '4', '10+1=?', '11;10;1;9', 'a', '2', 'clhung', '管理數學', '加減法'),
(2, '4', '1+10=?', '11;0;1;10', 'a', '2', 'clhung', '管理數學', '加減法'),
(3, '6', '10%5=0', '', 'true', '1', 'clhung', '管理數學', 'mod'),
(4, '', 'what is your name?', 'thanks you.;it is too hot;my name is ruby.;today is monday;ruby, is my name', 'c;e', '3', 'clhung', '英文', ''),
(5, '4', '10-1=?', '10;9;11;1', 'b', '2', 'clhung', '管理數學', '加減法'),
(6, '17', '西亞古文明發源於兩河流域，但文化分布的地區相當廣闊，請問下列哪一個區域並「不」包含在內？', '伊朗;小亞細亞;地中海東岸;阿拉伯半島', 'd', '2', 'test1', '世界歷史', '古文明的遺產'),
(7, '17', '下述四位同學一起於課後討論有關四大古文明的報告內容，請問何人所言正確？', '派大星：「四大古文明的共同特點是皆發源於大河流域、擁有肥沃的土地，且皆屬於亞洲國家。」;章魚哥：「西非的尼羅河曾有過輝煌的上埃及古文明，沖積出的肥沃土壤主要在孟斐斯一帶形成高度的農業文明。」;蟹老闆：「兩河流域文明的孕育之源來自於幼發拉底河、底格里斯河的沖積，並在阿拉伯半島南端形成肥沃月彎。」;海綿寶寶：「印度文明的發展早期在印度河一帶已出現城市文明，而後漸往恆河流域擴張，文明因而於此半島上開展。」', 'd', '2', 'test1', '世界歷史', '古文明的遺產'),
(8, '18', '下面是婷婷書寫有關「古埃及人的宗教信仰」的報告，請問：其中只有哪一項資料是正確的？', '古埃及社會為多神信仰，其中最主要的神明就是婆羅門神與尼羅河神。;尼羅河神是一切權力的來源，而統治埃及的法老，就是尼羅河神之子。;埃及人認為人死後靈魂不滅，於是製作「木乃伊」，以期待來世可以不斷輪迴而重生。;強調死後審判的觀念，行善者之靈魂如可通過審判的裁定，便可復活。', 'd', '2', 'test1', '世界歷史', '普世宗教與中古文明'),
(9, '18', '上古時期，各民族發揮想像力及創造力而創立了各式各樣的宗教，不僅成為人們心靈上的支柱，也為世界增添了不同的文化風貌。下列哪一個宗教並非是一神信仰？', '猶太教;基督教;印度教;伊斯蘭教', 'c', '2', 'test1', '世界歷史', '普世宗教與中古文明'),
(10, '18', ' <甲>佛教 <乙>祆教 <丙>婆羅門教 <丁>基督教<戊>印度教，上述哪些宗教的發源地在「南亞」？', '甲丙戊;甲乙丙戊;甲丙丁戊;甲乙丙丁戊', 'a', '2', 'test1', '世界歷史', '普世宗教與中古文明'),
(11, '20', '某一時期中，英國議員知道普魯士已經實施強迫入學的政策，而英國許多兒童仍然沒有受過任何教育。於是通過法案，設置教育部，並提出「初等教育法」，撥款興學，同時要求父母督促5到12歲的兒童上學。這是何時的情況？', '十七世紀後期;十八世紀中期;十九世紀後期;二十世紀中期', 'c', '2', 'test1', '世界歷史', '歐洲勢力的崛起'),
(13, '2', '以下那些是正確的?', '1+10=11;1+10-1=10;1-10=-9;1+10=9;1-10=11', 'a;b;c', '3', 'test1', '數學', '加減法'),
(14, '14', 'what is your name?', 'thanks you.;it is too hot;my name is ruby.;today is monday;ruby, is my name', 'c;e', '3', 'test1', '英文', '問候語'),
(20, '14', 'aaa', 'sss;dd;gg;ee', 'b', '2', 'test1', '英文', '問候語'),
(21, '21', '下列「　」內讀音，何者皆不相同？', '六馬仰「秣」／相濡以「沫」／塗「抹」巧飾;「衢」道奔馳／精神「矍」鑠／「瞿」然注視;虵「蟺」之穴／「饘」粥餬口／國勢迍「邅」;「螣」蛇飛舞／戶口「謄」本／「媵」妾婢女', 'b', '2', 'test1', '國文', '第一次段考'),
(22, '21', '下列文句當中，沒有錯別字的是：', '都市人假日裡往偏遠的鄉下去，是為了暫時逃離城市的喧囂;聽說你是學校籃球校隊隊員，改天我們一起砌磋球技吧;這臺機器採用最先進的蝸輪推進器，能夠節省能源，具有環保概念;他們兩人之間原來就有成見，加上流言喧染，終於爆發出衝突', 'a', '2', 'test1', '國文', '第一次段考'),
(23, '21', '(甲)「鴻鵠之志」，「鴻鵠」指大的箭靶；(乙)「犬馬之齒」，「犬馬」為自謙之詞；(丙)「胡、越之身」，「胡、越」取義於胡、越兩地南北分隔；(丁)「松喬之壽」，「松喬」取義於松木、喬木終年長青。上列敘述正確的選項是：', '(乙)(丙);(丙)(丁);(甲)(乙);(甲)(丁)', 'a', '2', 'test1', '國文', '第一次段考'),
(24, '21', '下列文句「　」內的字詞，解釋有誤的選項是：', '「繡口」一吐就半個盛唐：比喻斐然的詩才;更加「佯狂」：裝瘋;「冠蓋」滿途車騎的囂鬧：指被貶官流放之人;會突然「水遁」，或許就在明天：水中遁形之術。此指浪跡江湖', 'c', '2', 'test1', '國文', '第一次段考'),
(25, '21', '關於〈尋李白〉一詩的修辭，下列所敘何者正確？', '全詩古今交會，令人有時空錯亂之感;「傲慢的靴子」、「羞憤的手裡」二句分別以借喻的手法寫成;「怨長安城小而壺中天長」中的「小」、「長」運用了西方文學常用的矛盾修辭法;詩中出現「七仙」、「五友」等數量詞，均是虛詞並無實義', 'c', '2', 'test1', '國文', '第一次段考'),
(26, '21', '新詩雖是白話文學的產物，卻與古典文學有不可分割之關係，例如現代詩句「紅燭啊！匠人造了你，原是爲燒的，既已燒著，又何苦傷心落淚？」乃化用李商隱詩「蠟炬成灰淚始乾」，以下新詩與其所化用古典意象搭配錯誤的選項有：', '「一粒松子落了下來／沒一點預告／該派誰去接住它呢?／說時遲／那時快／一粒松子落下來／被整座空山接住」化用「空山松子落，幽人應未眠」;「只見後座一位儒者正在匆匆收拾行曩／書籍書稿舊衫撒了一地／七分狂喜，三分唏噓／有時仰首凝神，有時低眉沉吟／劫後的心是火，也是灰」化用「漫卷詩書喜欲狂」;「詩史寫到建安就得爬一座大山／歌雖然短，但沒酒不行／朝露被逐呎的海拔驅散／聽覺裡全是呦呦的鹿鳴」化用「綠螘新醅酒，紅泥小火爐，晚來天欲雪，能飲一杯無？」;「時間七月七日／地點長生殿／一個高瘦的青衫男子／一個沒有臉孔的女子／白色空氣中／一雙翅膀／飛入殿外的月色／漸去漸遠的／私語／閃爍而苦澀」化用「七月七日長生殿，夜半無人私語時，在天願作比翼鳥，在地願為連理枝，天長地久有時盡，此恨綿綿無絕期」', 'c', '2', 'test1', '國文', '第一次段考'),
(28, '21', '「伯牙鼓琴，六馬仰秣。」其意與下列何者最接近？', '間關鶯語花底滑，幽咽泉流水下灘;高山流水，韶虞武象;白沙在涅，與之俱黑;舞幽壑之潛蛟，泣孤舟之嫠婦', 'd', '2', 'test1', '國文', '第一次段考'),
(29, '21', '「玉在山而草木潤，淵生珠而崖不枯。」與下列何者意思相近？', '有諸己而後求諸人，無諸己而後非諸人;生而同聲，長而異俗;山不在高，有仙則名；水不在深，有龍則靈;物生自天，工開於人', 'c', '2', 'test1', '國文', '第一次段考'),
(31, '21', '下列哪些文句象徵「希望與救贖」？', '有一縷銀色的蜘蛛絲從天而降，彷彿怕被人發現似的，只發出一絲微光，輕捷地朝自己頭上垂掛下來;金色花蕊依舊向池畔飄送著莫可名狀的清香;只剩下極樂世界的半截蜘蛛絲，依然時隱時現地閃爍著一縷微光;偶爾會從黑暗中浮出朦朧的光影，卻是那可怕的刀山，令人膽顫心驚;無', 'a;b', '3', 'test1', '國文', '第一次段考'),
(34, '21', '「草木疇生，禽獸群焉。物各從其類也。」與下列何句相呼應？', '君子居必擇鄉，遊必就士;木受繩則直，金就礪則利;邪穢在身，怨之所構;尸鳩在桑，其子七兮', 'a', '2', 'test1', '國文', '第一次段考'),
(35, '21', '「學惡乎始？惡乎終？曰：其數則始乎誦經，終乎讀禮。」與下列何句相呼應？', '君子博學而日參省乎己;不聞先王之遺言，不知學問之大也;其義則始乎為士，終乎為聖人;聲無小而不聞，行無隱而不形', 'b', '2', 'test1', '國文', '第一次段考');

-- --------------------------------------------------------

--
-- Table structure for table `qcourse`
--

CREATE TABLE `qcourse` (
  `qcid` int(11) NOT NULL,
  `tid` varchar(20) NOT NULL,
  `qcname` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `section_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qcourse`
--

INSERT INTO `qcourse` (`qcid`, `tid`, `qcname`, `section_name`) VALUES
(2, 'test1', '數學', '加減法'),
(3, 'clhung', '英文', ''),
(4, 'clhung', '管理數學', '加減法'),
(5, 'clhung', '專題', ''),
(6, 'clhung', '管理數學', 'mod'),
(14, 'test1', '英文', '問候語'),
(15, 'test1', '地理', '認識地理學'),
(16, 'test1', '地理', '認識地圖'),
(17, 'test1', '世界歷史', '古文明的遺產'),
(18, 'test1', '世界歷史', '普世宗教與中古文明'),
(19, 'test1', '世界歷史', '世界文明的蛻變與互動'),
(20, 'test1', '世界歷史', '歐洲勢力的崛起'),
(21, 'test1', '國文', '第一次段考'),
(22, 'test1', '國文', '第二次段考'),
(23, 'test1', '國文', '第三次段考'),
(24, 'test1', '公民', '第一次段考'),
(25, 'test1', '公民', '第二次段考'),
(26, 'test1', '公民', '第三次段考'),
(27, 'test1', '中國歷史', '第一次段考'),
(28, 'test1', '中國歷史', '第二次段考'),
(30, 'test1', '英文', '第一次段考'),
(31, 'test1', '英文', '第二次段考'),
(32, 'test1', '英文', '第三次段考'),
(33, 'test1', '地理', '第一次段考'),
(34, 'test1', '地理', '第二次段考'),
(35, 'test1', '地理', '第三次段考'),
(37, 'test1', '生物', '第二次段考'),
(38, 'test1', '近代歷史', '第一章');

-- --------------------------------------------------------

--
-- Table structure for table `qsubject`
--

CREATE TABLE `qsubject` (
  `qsid` int(11) NOT NULL,
  `tid` varchar(20) NOT NULL,
  `qsubname` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qsubject`
--

INSERT INTO `qsubject` (`qsid`, `tid`, `qsubname`) VALUES
(1, 'ssyu', '程式設計(下)'),
(2, 'clhung', '資訊管理專題與個案(上)'),
(3, 'clhung', '管理數學'),
(4, 'pyyin', '離散數學'),
(5, 'clhung', '英文'),
(7, 'test1', '國文'),
(8, 'test1', '數學'),
(9, 'test1', '英文'),
(11, 'test1', '地理'),
(12, 'test1', '世界歷史'),
(13, 'test1', '公民'),
(14, 'test1', '中國歷史'),
(15, 'test1', '生物'),
(16, 'test1', '地球科學'),
(17, 'test1', '近代歷史'),
(20, 'ssyu', '資料庫');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `testid` int(11) NOT NULL,
  `builder` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `testname` text COLLATE utf8_unicode_ci NOT NULL,
  `builddate` date NOT NULL,
  `questionid` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`testid`, `builder`, `testname`, `builddate`, `questionid`) VALUES
(2, 'test1', '測試_第一次', '2016-10-27', '7;8'),
(3, 'test1', '測試_第二次', '2016-10-27', '9'),
(4, 'test1', '測試_第一次', '2016-10-27', '22;35'),
(5, 'test1', '測試_第三次', '2016-10-28', '6;9'),
(6, 'test1', '測試_第一次', '2016-10-31', '13'),
(7, 'test1', '測試_1031', '2016-10-31', '21;22'),
(8, 'test1', '10312041', '2016-10-31', '21;29'),
(9, 'test1', 'testing', '2016-10-31', '8;11'),
(10, 'test1', '1102國文測驗', '2016-11-02', '21;25;29');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `userid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `courseid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `userans` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `questionid` int(11) NOT NULL,
  `answer` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tf` tinyint(1) NOT NULL,
  `semester` int(11) NOT NULL,
  `class` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `testid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `try_bank`
--

CREATE TABLE `try_bank` (
  `subject` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `question` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `choice` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `answer` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `section_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userid` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `try_bank`
--

INSERT INTO `try_bank` (`subject`, `question`, `choice`, `answer`, `type`, `section_name`, `userid`) VALUES
('', '1-3=?', '0;1;-1;-2', 'd', '', '', ''),
('英文', 'what is your name?', 'my name is ruby.;it is too hot;thanks you;today is monday', 'a', '2', '', 'test1'),
('數學', '1+3=?', '4;-2;3;0', 'a', '2', 'counting', 'test2'),
('數學', '1*3=?', '4;-2;3;0', 'c', '2', 'crossing', 'test2'),
('', '1-3=?', '0;1;2;-2', 'd', '', '', ''),
('', '1+3*2=?', '8;7;-7;-8', 'b', '2', '', ''),
('', '10%3=?', '30;7;3;1', 'd', '2', '', ''),
('', '10/3=?', '3;7;13;30', 'a', '2', '', ''),
('', '10%5=?', '5;2;0;15', 'c', '2', '', 'clhung');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `userid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `sex` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userid`, `pwd`, `username`, `status`, `sex`, `phonenumber`) VALUES
('102213001', '001', '徐玉兒', 0, 'F', ''),
('102213002', '002', '吳柔瑾', 0, 'F', ''),
('102213009', '009', '龔家巧', 0, 'F', ''),
('102213024', '024', '呂晨萱', 0, 'F', ''),
('102213066', '066', '黃怡禎', 0, 'F', ''),
('clhung', 'clhung', '洪嘉良', 1, 'M', ''),
('pyyin', 'pyyin', '尹邦嚴', 1, 'M', ''),
('ssyu', 'ssyu', '俞旭昇', 1, 'M', ''),
('test1', 'test1', 'ruby', 1, 'F', ''),
('test2', 'test2', 'test', 1, 'M', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choosecourse`
--
ALTER TABLE `choosecourse`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`questionid`);

--
-- Indexes for table `qcourse`
--
ALTER TABLE `qcourse`
  ADD PRIMARY KEY (`qcid`);

--
-- Indexes for table `qsubject`
--
ALTER TABLE `qsubject`
  ADD PRIMARY KEY (`qsid`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`testid`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `questionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `qcourse`
--
ALTER TABLE `qcourse`
  MODIFY `qcid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `qsubject`
--
ALTER TABLE `qsubject`
  MODIFY `qsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `testid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
