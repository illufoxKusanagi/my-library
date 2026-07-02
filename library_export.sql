-- MySQL dump 10.13  Distrib 8.0.44, for Linux (x86_64)
--
-- Host: gateway01.ap-southeast-1.prod.aws.tidbcloud.com    Database: my_library
-- ------------------------------------------------------
-- Server version	8.0.11-TiDB-v8.5.3-serverless

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `book_category`
--

DROP TABLE IF EXISTS `book_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book_category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `book_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) /*T![clustered_index] CLUSTERED */,
  KEY `book_category_book_id_foreign` (`book_id`),
  KEY `book_category_category_id_foreign` (`category_id`),
  CONSTRAINT `book_category_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  CONSTRAINT `book_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=30001;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_category`
--

LOCK TABLES `book_category` WRITE;
/*!40000 ALTER TABLE `book_category` DISABLE KEYS */;
INSERT INTO `book_category` VALUES (1,1,16,NULL,NULL),(2,1,7,NULL,NULL),(3,1,15,NULL,NULL),(4,1,20,NULL,NULL),(5,1,10,NULL,NULL),(6,2,5,NULL,NULL),(7,2,3,NULL,NULL),(8,2,1,NULL,NULL),(9,2,21,NULL,NULL),(10,3,18,NULL,NULL),(11,3,17,NULL,NULL),(12,3,9,NULL,NULL),(13,4,11,NULL,NULL),(14,4,22,NULL,NULL),(15,4,6,NULL,NULL),(16,5,3,NULL,NULL),(17,5,18,NULL,NULL),(18,5,12,NULL,NULL),(19,5,10,NULL,NULL),(20,6,18,NULL,NULL),(21,6,12,NULL,NULL),(22,6,13,NULL,NULL),(23,6,19,NULL,NULL),(24,6,10,NULL,NULL),(25,7,3,NULL,NULL),(26,7,18,NULL,NULL),(27,7,10,NULL,NULL),(28,8,5,NULL,NULL),(29,8,18,NULL,NULL),(30,8,8,NULL,NULL),(31,8,2,NULL,NULL),(32,8,19,NULL,NULL),(33,9,22,NULL,NULL),(34,9,12,NULL,NULL),(35,9,10,NULL,NULL),(36,10,6,NULL,NULL),(37,11,18,NULL,NULL),(38,11,12,NULL,NULL),(39,11,13,NULL,NULL),(40,11,10,NULL,NULL),(41,12,22,NULL,NULL),(42,12,14,NULL,NULL),(43,12,4,NULL,NULL),(44,13,18,NULL,NULL),(45,13,22,NULL,NULL),(46,13,7,NULL,NULL),(47,13,12,NULL,NULL),(48,14,3,NULL,NULL),(49,14,8,NULL,NULL),(50,14,2,NULL,NULL),(51,14,14,NULL,NULL),(52,15,18,NULL,NULL),(53,15,12,NULL,NULL),(54,15,10,NULL,NULL);
/*!40000 ALTER TABLE `book_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `book_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `synopsis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) /*T![clustered_index] CLUSTERED */
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=30001;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'BK001','Another','available','another','Another-1701875542.png','During the spring of 1998 in the town of Yomiyama, Kouichi Sakakibara is supposed to start classes at a new school. Unfortunately, he is stuck in the hospital due to a collapsed lung. When he is wandering the hospital, he meets a dark-haired girl named Mei Misaki wearing his new school\'s uniform—an innocent chance encounter that will have more repercussions than he knows.\n \nWhen Sakakibara is finally able to attend classes at Yomiyama North Middle School, he notices his classmates treat Misaki as if she doesn\'t exist. He tries to uncover the mystery around her, but his classmates\' behavior only gets stranger. And when fellow students in Class 3-3 inexplicably begin dying horrible deaths, Sakakibara begins to question a link between Misaki and the rising body count.',NULL,'2026-06-15 04:07:02','2026-06-15 04:07:02'),(2,'BK002','Dr Stone','available','dr-stone','Dr Stone-1701873438.png','When a mysterious light suddenly engulfs Earth, humanity is left petrified, frozen in stone. Thousands of years later, the world is teeming with vegetation, and forests have taken the places of cities that once stood proudly. One of the very first to emerge from their stone prison is Taiju Ooki, who finds that his good friend, a brilliant young scientist named Senkuu, has been preparing for his awakening. While Taiju wishes to save the girl he loves, Senkuu is determined to figure out the cause behind the strange phenomenon and restore the world to its former glory.\n\nBut when they free the infamously powerful Tsukasa Shishiou in order to gain an upper hand against the dangers in an unfamiliar world, they realize that their new comrade has other plans. Tsukasa sees their predicament as a chance to start over; free from the corruption and destruction wrought by technology, he will stop at nothing to achieve his goals. With both sides unable to see eye to eye, Senkuu and his devotion to science will clash with Tsukasa and his primal nature in what will truly be a battle of the ages.',NULL,'2026-06-15 04:07:03','2026-06-15 04:07:03'),(3,'BK003','Grand Blue Dreaming','available','grand-blue-dreaming','Grand Blue Dreaming-1701838971.png','Among the seaside town of Izu\'s ocean waves and rays of shining sun, Iori Kitahara is just beginning his freshman year at Izu University. As he moves into his uncle\'s scuba diving shop, Grand Blue, he eagerly anticipates his dream college life, filled with beautiful girls and good friends.\n\nBut things don\'t exactly go according to plan. Upon entering the shop, he encounters a group of rowdy, naked upperclassmen, who immediately coerce him into participating in their alcoholic activities. Though unwilling at first, Iori quickly gives in and becomes the heart and soul of the party. Unfortunately, this earns him the scorn of his cousin, Chisa Kotegawa, who walks in at precisely the wrong time. Undeterred, Iori still vows to realize his ideal college life, but will things go according to plan this time, or will his situation take yet another dive?',NULL,'2026-06-15 04:07:03','2026-06-15 04:07:03'),(4,'BK004','Initial D','available','initial-d','Initial D-1701875322.png','There is said to be a legendary \"Ghost of Akina\" that holds the fastest time to descend the Akina Pass. No one has ever come close to beating the record, nor has the mysterious driver of the white Toyota AE86 ever revealed themselves. Nowadays, the same AE86 can be seen every morning driving up and down the pass, making trips to a hotel residing at the top of the mountain.\n\nUnlike his classmates and coworkers, Takumi Fujiwara did not like cars. Any conversation about them would remind him of his early morning routine of delivering tofu for his father. He did not see the appeal in street racing and knew nothing about its rules or its culture. However, when tagging along to a nighttime meetup, the appearance of a rival racing team at the Akina Pass compels Takumi to hop behind the wheel of his father\'s AE86 and race them down the familiar mountain.\n\nThis spur-of-the-moment decision marks the beginning of Takumi\'s high-octane journey, shifting from his daily deliveries to becoming the greatest drift racer ever. Along the way, he slowly finds and kindles his love for street racing as he comes face-to-face with a plethora of opponents, each ready to take on the renowned Ghost of Akina.',NULL,'2026-06-15 04:07:04','2026-06-15 04:07:04'),(5,'BK005','Kaguya-sama wa Kokurasetai','available','kaguya-sama-wa-kokurasetai','Kaguya-sama wa Kokurasetai-1701874422.png','Considered a genius due to having the highest grades in the country, Miyuki Shirogane leads the prestigious Shuchiin Academy\'s student council as its president, working alongside the beautiful and wealthy vice president Kaguya Shinomiya. The two are often regarded as the perfect couple by students despite them not being in any sort of romantic relationship.\n\nHowever, the truth is that after spending so much time together, the two have developed feelings for one another; unfortunately, neither is willing to confess, as doing so would be a sign of weakness. With their pride as elite students on the line, Miyuki and Kaguya embark on a quest to do whatever is necessary to get a confession out of the other. Through their daily antics, the battle of love begins!',NULL,'2026-06-15 04:07:04','2026-06-15 04:07:04'),(6,'BK006','Kimi no Koto ga Daidaidaidaidaisuki na 100-nin no Kanojo','available','kimi-no-koto-ga-daidaidaidaidaisuki-na-100-nin-no-kanojo','Kimi no Koto ga Daidaidaidaidaisuki na 100-nin no Kanojo-1701838883.png','Upon graduating middle school, Rentarou Aijou manages to confess to the girl he loves. Unfortunately, he gets rejected, making it his 100th rejection in a row. Having experienced heartbreak after heartbreak, he goes to a matchmaking shrine and prays with the hope of finally getting a girlfriend in high school. Suddenly, the god of the shrine appears, promising Rentarou that he will meet one hundred soulmates in high school.\n\nAlthough skeptical at first, Rentarou quickly acknowledges the truth behind the god\'s words when two of his soulmates—Hakari Hanazono and Karane Inda—confess to him the very same day that they meet him. However, there was one detail that the god forgot to tell Rentarou: if any of his soulmates fails to get into a relationship with him, they will die. Now trapped in a matter of life and death, Rentarou decides to date all of his soulmates.\n\nWith a heart so big that it can be shared among one hundred girlfriends, Rentarou makes the most out of his unanticipated high school life, with the Rentarou family growing ever larger!',NULL,'2026-06-15 04:07:04','2026-06-15 04:07:04'),(7,'BK007','Komi-san wa, Comyushou desu','available','komi-san-wa-comyushou-desu','Komi-san wa, Comyushou desu-1701874091.png','It\'s Shouko Komi\'s first day at the prestigious Itan Private High School, and she has already risen to the status of the school\'s Madonna. With long black hair and a tall, graceful appearance, she captures the attention of anyone who comes across her. There\'s just one problem though—despite her popularity, Shouko is terrible at communicating with others.\n\nHitohito Tadano is your average high school boy. With his life motto of \"read the situation and make sure to stay away from trouble,\" he quickly finds that sitting next to Shouko has made him the enemy of everyone in his class! One day, knocked out by accident, Hitohito later wakes up to the sound of Shouko\'s \"meow.\" He lies that he heard nothing, causing Shouko to run away. But before she can escape, Hitohito surmises that Shouko is not able to talk to others easily—in fact, she has never been able to make a single friend. Hitohito resolves to help Shouko with her goal of making one hundred friends so that she can overcome her communication disorder.',NULL,'2026-06-15 04:07:05','2026-06-15 04:07:05'),(8,'BK008','Kono Subarashii Sekai ni Shukufuku wo!','available','kono-subarashii-sekai-ni-shukufuku-wo','Kono Subarashii Sekai ni Shukufuku wo!-1701874035.png','Kazuma Satou lives a laughable and pathetic life, being a shut-in NEET with no distinguishable qualities other than an addiction to video games. On his way home, Kazuma dies trying to save a girl from an oncoming truck—or so he believes. In reality, the \"truck\" was a slow-moving tractor, and he merely died from shock.\n\nWaking up in limbo between death and heaven, Kazuma finds himself facing the arrogant goddess Aqua. Here, he must choose between two options: go on to heaven or be sent to a fantasy world that needs his help to defeat the Demon King. Initially unimpressed by the challenging prospect of fighting a Demon King, Kazuma changes his mind after Aqua tells him he can bring any one item he wants. What better choice does Kazuma have than the goddess standing before him?\n\nUnfortunately, after the two arrive in their new world, two things become clear: Aqua is useless beyond belief, and life in this fantasy realm will be anything but smooth sailing. From paying for food and accommodations to trying to learn new skills, the duo\'s problems are just starting to take shape—and the arrival of eccentric allies may only make things worse.',NULL,'2026-06-15 04:07:05','2026-06-15 04:07:05'),(9,'BK009','Kuzu no Honkai','available','kuzu-no-honkai','Kuzu no Honkai-1701838571.png','Unrequited love is a tragic circumstance with no simple resolution. It comes in many forms, yet each one shares the same debilitating feeling of inconceivable longing.\n\nHanabi Yasuraoka and Mugi Awaya are two high school students who appear to have the ideal relationship. They are the envy of their classmates, and it is easy to portray them as the classic example of high school sweethearts. Unbeknownst to friends and family, however, there is a side to their love veiled by hidden passions: their true affections lie elsewhere, and they use each other to physically sate their unreciprocated feelings.\n\nHanabi is in love with Narumi Kanai, her new homeroom teacher who is also her childhood friend. Mugi is in love with Akane Minagawa, who used to be his tutor when he was younger. Now teachers at the same school, Kanai and Minagawa begin to show an interest in one another. As a result, Mugi and Hanabi find solace in each other as victims of the same pain.\n\nWith little hope of their feelings being realized, these two students face a challenging predicament: cope with and move on from their lust, or become further entangled in their web of unrequited love.\n\n\n\nIncluded one-shots:\nVolume 1: Nyan Nyan Prelude\nVolume 2: Nyan Nyan Serenade\nVolume 3: Nyan Nyan Oratorio\nVolume 4: Nyan Nyan Cantata\nVolume 5: Nyan Nyan Andante',NULL,'2026-06-15 04:07:05','2026-06-15 04:07:05'),(10,'BK010','MF Ghost','available','mf-ghost','MF Ghost-1701873991.png','By the 2020s, cars with internal combustion engines have largely been phased out, replaced by self-driving electric and fuel cell vehicles instead. Though these fossil fuel-running cars are at risk of disappearing completely, a dedicated group in Japan known as the MFG strives to maintain interest in them through road races streamed online. With 10 billion yen at stake and more than three hundred drivers competing, only the Godly Fifteen—the top 15 racers in the circuit—have a chance at advancing and taking the coveted prize.\n\nFresh off a plane from England, 19-year-old Kanata Rivington is eager to take on the fourth installment of the MFG competition. Trained at an elite driving school in his home country, the half-Japanese driver vies for the competition\'s top spot in his hand-me-down Toyota 86 GT. Despite the disadvantages that come with a dated car, the newcomer is determined to become one of this year\'s Godly Fifteen.\n\nKanata adopts his father\'s last name, taking on the moniker \"Kanata Katagiri.\" Conquering the Japanese racing circuit is only a stepping stone towards his real goal: discovering the whereabouts of his missing father.',NULL,'2026-06-15 04:07:06','2026-06-15 04:07:06'),(11,'BK011','Nisekoi','available','nisekoi','Nisekoi-1701875073.png','When Raku Ichijou was young, he made a heartfelt promise to his childhood friend that if they were to meet again, they would marry each other. Ten years have passed since that fateful day, leaving Raku\'s memory of her faded. But he still holds a relic of their relationship together—a locked pendant, which his childhood friend holds the key to. He hopes to reunite with her one day, despite not remembering what she looks like.\n\nNow a first-year student at Bonyari High School, Raku attempts to live a normal life, dreaming of becoming a public servant and marrying his crush Kosaki Onodera. However, this isn\'t as easy as it seems, as he is the unwilling heir to a large yakuza family, and Raku can\'t escape from his duties when the American Bee Hive gang wages war on his family\'s turf. In order to forge peace between the two feuding families, Raku is forced into a fake romantic relationship with Chitoge Kirisaki, the beautiful daughter of the Bee Hive\'s leader. The two quickly come to hate each other, but have to learn to live together and pretend to be deeply in love in order to keep their families at bay. \n\nHowever, Raku\'s quest for the key to his pendant isn\'t becoming easier as more girls—who were all involved with his pendant in some way—enter his life. Join Raku as he juggles his false relationship, maintains the balance between warring families, and unravels the identity of the girl who will unlock his heart.',NULL,'2026-06-15 04:07:07','2026-06-15 04:07:07'),(12,'BK012','Oshi no Ko','available','oshi-no-ko','Oshi no Ko-1701838063.webp','Sixteen-year-old Ai Hoshino is a talented and beautiful idol who is adored by her fans. She is the personification of a pure, young maiden. But all that glitters is not gold.\n\nGorou Amemiya is a countryside gynecologist and a big fan of Ai. So when the pregnant idol shows up at his hospital, he is beyond bewildered. Gorou promises her a safe delivery. Little does he know, an encounter with a mysterious figure would result in his untimely death—or so he thought.\n\nOpening his eyes in the lap of his beloved idol, Gorou finds that he has been reborn as Aquamarine Hoshino—Ai\'s newborn son! With his world turned upside down, Gorou soon learns that the world of showbiz is paved with thorns, where talent does not always beget success. Will he manage to protect Ai\'s smile that he loves so much with the help of an eccentric and unexpected ally?',NULL,'2026-06-15 04:07:07','2026-06-15 04:07:07'),(13,'BK013','Tantei wa Mou Shindeiru','available','tantei-wa-mou-shindeiru','Tantei wa Mou Shindeiru-1701839288.png','Kimihiko Kimizuka is a crisis-magnet. From getting caught up in a crime scene to accidentally witnessing a drug deal, trouble seems to find him around every corner. So it is no surprise when his rather mundane flight suddenly enters a state of emergency with a dire need of a detective onboard. Unfortunately, his attempt at avoiding trouble is foiled by a beautiful girl with silver hair who goes by the codename Siesta. Declaring herself a detective, she unceremoniously drags Kimizuka into the case as her assistant.\n\nThat incident spelled the beginning of an adventure around the globe that went beyond his wildest imagination. Putting their lives on the line, the two took down criminal organizations, prevented disasters, and saved thousands. But the curtain closed to their epic journey with Siesta\'s untimely death three years later.\n\nResolving to live an ordinary high school life this time, Kimizuka spends a year maintaining a low profile. However, as fate would have it, a girl with an uncanny resemblance to Siesta comes crashing into his life, threatening to throw his peaceful days into disarray.',NULL,'2026-06-15 04:07:08','2026-06-15 04:07:08'),(14,'BK014','Tensei shitara Slime Datta Ken','available','tensei-shitara-slime-datta-ken','Tensei shitara Slime Datta Ken-1701929117.png','It is just another ordinary day for Satoru Mikami. The sun is shining brightly on the streets of Tokyo, and he is in the midst of a discussion with his colleagues when suddenly he gets stabbed by a passing robber. The average 37-year-old corporate worker is now at death\'s door, and he has only one regret—dying a virgin. Fading out, he is startled by a mysterious AI-like voice reciting commands. \n\nSatoru abruptly wakes up in the middle of a strange cave, but something odd has happened: he is now a goop of slime! Thanks to his new body, he has acquired the skill to absorb anything and obtain its appearance and abilities. While testing out his newfound powers and exploring the cave, he stumbles upon a massive dragon named Veldora, who has been sealed away for the past three hundred years. After quickly befriending the beast, Satoru decides to help him escape; in exchange, Satoru is bestowed a new name: \"Rimuru Tempest.\"\n\nWishing to avoid a life like his boring and mundane past, Rimuru is about to set out on a grand quest that will change his own destiny and the fate of his new world.',NULL,'2026-06-15 04:07:09','2026-06-15 04:07:09'),(15,'BK015','Tokidoki Bosotto Russia-go de Dereru Tonari no Aalya-san','available','tokidoki-bosotto-russia-go-de-dereru-tonari-no-aalya-san','Tokidoki Bosotto Russia-go de Dereru Tonari no Aalya-san-1701874150.png','Smart, refined, and strikingly gorgeous, half-Russian half-Japanese Alisa Mikhailovna Kujou is considered the idol of her school. With her long silver hair, mesmerizing blue eyes, and exceptionally fair skin, she has captured the hearts of countless male students while being highly admired by all others. Even so, due to her seemingly unapproachable persona, everyone remains wary around the near-flawless girl.\n\nOne of the few exceptions is Alisa\'s benchmate Masachika Kuze, a relatively average boy who spends his days watching anime and playing gacha games. Despite his nonchalant demeanor, Masachika is the sole student to receive Alisa\'s attention. Unable to be fully honest, Alisa is frequently harsh on Masachika and only expresses her affection in Russian. Unbeknownst to her, however, Masachika actually understands the language yet simply pretends otherwise for his own amusement.\n\nAs the odd pair continues to exchange witty and playful remarks, their relationship gradually grows more romantic and delightful—and Alisa might finally learn to freely convey her true feelings.',NULL,'2026-06-15 04:07:10','2026-06-15 04:07:10');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) /*T![clustered_index] CLUSTERED */
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=36580;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Suspense','suspense',NULL,'2026-06-15 04:06:56','2026-06-15 04:06:56'),(2,'Isekai','isekai',NULL,'2026-06-15 04:06:57','2026-06-15 04:06:57'),(3,'Award Winning','award-winning',NULL,'2026-06-15 04:06:57','2026-06-15 04:06:57'),(4,'Showbiz','showbiz',NULL,'2026-06-15 04:06:57','2026-06-15 04:06:57'),(5,'Adventure','adventure',NULL,'2026-06-15 04:06:57','2026-06-15 04:06:57'),(6,'Racing','racing',NULL,'2026-06-15 04:06:57','2026-06-15 04:06:57'),(7,'Mystery','mystery',NULL,'2026-06-15 04:06:58','2026-06-15 04:06:58'),(8,'Fantasy','fantasy',NULL,'2026-06-15 04:06:58','2026-06-15 04:06:58'),(9,'Gag Humor','gag-humor',NULL,'2026-06-15 04:06:58','2026-06-15 04:06:58'),(10,'School','school',NULL,'2026-06-15 04:06:58','2026-06-15 04:06:58'),(11,'Action','action',NULL,'2026-06-15 04:06:59','2026-06-15 04:06:59'),(12,'Romance','romance',NULL,'2026-06-15 04:06:59','2026-06-15 04:06:59'),(13,'Harem','harem',NULL,'2026-06-15 04:06:59','2026-06-15 04:06:59'),(14,'Reincarnation','reincarnation',NULL,'2026-06-15 04:06:59','2026-06-15 04:06:59'),(15,'Supernatural','supernatural',NULL,'2026-06-15 04:06:59','2026-06-15 04:06:59'),(16,'Horror','horror',NULL,'2026-06-15 04:07:00','2026-06-15 04:07:00'),(17,'Adult Cast','adult-cast',NULL,'2026-06-15 04:07:00','2026-06-15 04:07:00'),(18,'Comedy','comedy',NULL,'2026-06-15 04:07:01','2026-06-15 04:07:01'),(19,'Parody','parody',NULL,'2026-06-15 04:07:01','2026-06-15 04:07:01'),(20,'Gore','gore',NULL,'2026-06-15 04:07:02','2026-06-15 04:07:02'),(21,'Survival','survival',NULL,'2026-06-15 04:07:02','2026-06-15 04:07:02'),(22,'Drama','drama',NULL,'2026-06-15 04:07:02','2026-06-15 04:07:02');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) /*T![clustered_index] CLUSTERED */,
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) /*T![clustered_index] CLUSTERED */
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=114804;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_11_20_161029_add_role_table',1),(6,'2023_11_20_162321_add_role_id_coloumn_to_users_table',1),(7,'2023_11_20_163555_create_categories_table',1),(8,'2023_11_20_163704_create_books_table',1),(9,'2023_11_20_163923_create_book_category_table',1),(10,'2023_11_20_164649_create_rent_log_table',1),(11,'2023_12_06_001156_create_request_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) /*T![clustered_index] NONCLUSTERED */
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) /*T![clustered_index] CLUSTERED */,
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rent_log`
--

DROP TABLE IF EXISTS `rent_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rent_log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `book_id` bigint unsigned NOT NULL,
  `rent_date` date NOT NULL,
  `return_date` date NOT NULL,
  `actual_return_date` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) /*T![clustered_index] CLUSTERED */,
  KEY `rent_log_user_id_foreign` (`user_id`),
  KEY `rent_log_book_id_foreign` (`book_id`),
  CONSTRAINT `rent_log_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `rent_log_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rent_log`
--

LOCK TABLES `rent_log` WRITE;
/*!40000 ALTER TABLE `rent_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `rent_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `request` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `book_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `request_date` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) /*T![clustered_index] CLUSTERED */,
  KEY `request_book_id_foreign` (`book_id`),
  KEY `request_user_id_foreign` (`user_id`),
  CONSTRAINT `request_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  CONSTRAINT `request_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request`
--

LOCK TABLES `request` WRITE;
/*!40000 ALTER TABLE `request` DISABLE KEYS */;
/*!40000 ALTER TABLE `request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) /*T![clustered_index] CLUSTERED */
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=33252;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','2026-06-15 04:06:55','2026-06-15 04:06:55'),(2,'client','2026-06-15 04:06:55','2026-06-15 04:06:55');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`) /*T![clustered_index] CLUSTERED */,
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=30001;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@library.com','$2y$12$IoIcGfu6A8vHrgd0VkooD.wzMUWuedDedPhxgU2/RapvSOvbReZ..',NULL,NULL,'active','admin',NULL,'2026-06-15 04:06:56','2026-06-15 04:06:56',1),(2,'ariefsatria','email@gmail.com','$2y$12$HuINMGJ5pzxT8zcV/f/6HejcUYQvxKO/.hi1N.vdilu/Cw/VUib.W','12345','jiwan','active','ariefsatria',NULL,'2026-06-15 04:08:28','2026-06-15 04:08:28',2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-07-01 18:56:40
