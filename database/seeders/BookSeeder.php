<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Categories;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryMap = [];
        $categoryMap['Suspense'] = Categories::create(['name' => 'Suspense'])->id;
        $categoryMap['Isekai'] = Categories::create(['name' => 'Isekai'])->id;
        $categoryMap['Award Winning'] = Categories::create(['name' => 'Award Winning'])->id;
        $categoryMap['Showbiz'] = Categories::create(['name' => 'Showbiz'])->id;
        $categoryMap['Adventure'] = Categories::create(['name' => 'Adventure'])->id;
        $categoryMap['Racing'] = Categories::create(['name' => 'Racing'])->id;
        $categoryMap['Mystery'] = Categories::create(['name' => 'Mystery'])->id;
        $categoryMap['Fantasy'] = Categories::create(['name' => 'Fantasy'])->id;
        $categoryMap['Gag Humor'] = Categories::create(['name' => 'Gag Humor'])->id;
        $categoryMap['School'] = Categories::create(['name' => 'School'])->id;
        $categoryMap['Action'] = Categories::create(['name' => 'Action'])->id;
        $categoryMap['Romance'] = Categories::create(['name' => 'Romance'])->id;
        $categoryMap['Harem'] = Categories::create(['name' => 'Harem'])->id;
        $categoryMap['Reincarnation'] = Categories::create(['name' => 'Reincarnation'])->id;
        $categoryMap['Supernatural'] = Categories::create(['name' => 'Supernatural'])->id;
        $categoryMap['Horror'] = Categories::create(['name' => 'Horror'])->id;
        $categoryMap['Adult Cast'] = Categories::create(['name' => 'Adult Cast'])->id;
        $categoryMap['Comedy'] = Categories::create(['name' => 'Comedy'])->id;
        $categoryMap['Parody'] = Categories::create(['name' => 'Parody'])->id;
        $categoryMap['Gore'] = Categories::create(['name' => 'Gore'])->id;
        $categoryMap['Survival'] = Categories::create(['name' => 'Survival'])->id;
        $categoryMap['Drama'] = Categories::create(['name' => 'Drama'])->id;

        $books = [
            [
                'data' => [
                    'book_code' => 'BK001',
                    'title' => 'Another',
                    'cover' => 'Another-1701875542.png',
                    'synopsis' => 'During the spring of 1998 in the town of Yomiyama, Kouichi Sakakibara is supposed to start classes at a new school. Unfortunately, he is stuck in the hospital due to a collapsed lung. When he is wandering the hospital, he meets a dark-haired girl named Mei Misaki wearing his new school\'s uniform—an innocent chance encounter that will have more repercussions than he knows.
 
When Sakakibara is finally able to attend classes at Yomiyama North Middle School, he notices his classmates treat Misaki as if she doesn\'t exist. He tries to uncover the mystery around her, but his classmates\' behavior only gets stranger. And when fellow students in Class 3-3 inexplicably begin dying horrible deaths, Sakakibara begins to question a link between Misaki and the rising body count.',
                    'status' => 'available'
                ],
                'categories' => [$categoryMap['Horror'], $categoryMap['Mystery'], $categoryMap['Supernatural'], $categoryMap['Gore'], $categoryMap['School']]
            ],
            [
                'data' => [
                    'book_code' => 'BK002',
                    'title' => 'Dr Stone',
                    'cover' => 'Dr Stone-1701873438.png',
                    'synopsis' => 'When a mysterious light suddenly engulfs Earth, humanity is left petrified, frozen in stone. Thousands of years later, the world is teeming with vegetation, and forests have taken the places of cities that once stood proudly. One of the very first to emerge from their stone prison is Taiju Ooki, who finds that his good friend, a brilliant young scientist named Senkuu, has been preparing for his awakening. While Taiju wishes to save the girl he loves, Senkuu is determined to figure out the cause behind the strange phenomenon and restore the world to its former glory.

But when they free the infamously powerful Tsukasa Shishiou in order to gain an upper hand against the dangers in an unfamiliar world, they realize that their new comrade has other plans. Tsukasa sees their predicament as a chance to start over; free from the corruption and destruction wrought by technology, he will stop at nothing to achieve his goals. With both sides unable to see eye to eye, Senkuu and his devotion to science will clash with Tsukasa and his primal nature in what will truly be a battle of the ages.',
                    'status' => 'available'
                ],
                'categories' => [$categoryMap['Adventure'], $categoryMap['Award Winning'], $categoryMap['Suspense'], $categoryMap['Survival']]
            ],
            [
                'data' => [
                    'book_code' => 'BK003',
                    'title' => 'Grand Blue Dreaming',
                    'cover' => 'Grand Blue Dreaming-1701838971.png',
                    'synopsis' => 'Among the seaside town of Izu\'s ocean waves and rays of shining sun, Iori Kitahara is just beginning his freshman year at Izu University. As he moves into his uncle\'s scuba diving shop, Grand Blue, he eagerly anticipates his dream college life, filled with beautiful girls and good friends.

But things don\'t exactly go according to plan. Upon entering the shop, he encounters a group of rowdy, naked upperclassmen, who immediately coerce him into participating in their alcoholic activities. Though unwilling at first, Iori quickly gives in and becomes the heart and soul of the party. Unfortunately, this earns him the scorn of his cousin, Chisa Kotegawa, who walks in at precisely the wrong time. Undeterred, Iori still vows to realize his ideal college life, but will things go according to plan this time, or will his situation take yet another dive?',
                    'status' => 'available'
                ],
                'categories' => [$categoryMap['Comedy'], $categoryMap['Adult Cast'], $categoryMap['Gag Humor']]
            ],
            [
                'data' => [
                    'book_code' => 'BK004',
                    'title' => 'Initial D',
                    'cover' => 'Initial D-1701875322.png',
                    'synopsis' => 'There is said to be a legendary "Ghost of Akina" that holds the fastest time to descend the Akina Pass. No one has ever come close to beating the record, nor has the mysterious driver of the white Toyota AE86 ever revealed themselves. Nowadays, the same AE86 can be seen every morning driving up and down the pass, making trips to a hotel residing at the top of the mountain.

Unlike his classmates and coworkers, Takumi Fujiwara did not like cars. Any conversation about them would remind him of his early morning routine of delivering tofu for his father. He did not see the appeal in street racing and knew nothing about its rules or its culture. However, when tagging along to a nighttime meetup, the appearance of a rival racing team at the Akina Pass compels Takumi to hop behind the wheel of his father\'s AE86 and race them down the familiar mountain.

This spur-of-the-moment decision marks the beginning of Takumi\'s high-octane journey, shifting from his daily deliveries to becoming the greatest drift racer ever. Along the way, he slowly finds and kindles his love for street racing as he comes face-to-face with a plethora of opponents, each ready to take on the renowned Ghost of Akina.',
                    'status' => 'available'
                ],
                'categories' => [$categoryMap['Action'], $categoryMap['Drama'], $categoryMap['Racing']]
            ],
            [
                'data' => [
                    'book_code' => 'BK005',
                    'title' => 'Kaguya-sama wa Kokurasetai',
                    'cover' => 'Kaguya-sama wa Kokurasetai-1701874422.png',
                    'synopsis' => 'Considered a genius due to having the highest grades in the country, Miyuki Shirogane leads the prestigious Shuchiin Academy\'s student council as its president, working alongside the beautiful and wealthy vice president Kaguya Shinomiya. The two are often regarded as the perfect couple by students despite them not being in any sort of romantic relationship.

However, the truth is that after spending so much time together, the two have developed feelings for one another; unfortunately, neither is willing to confess, as doing so would be a sign of weakness. With their pride as elite students on the line, Miyuki and Kaguya embark on a quest to do whatever is necessary to get a confession out of the other. Through their daily antics, the battle of love begins!',
                    'status' => 'available'
                ],
                'categories' => [$categoryMap['Award Winning'], $categoryMap['Comedy'], $categoryMap['Romance'], $categoryMap['School']]
            ],
            [
                'data' => [
                    'book_code' => 'BK006',
                    'title' => 'Kimi no Koto ga Daidaidaidaidaisuki na 100-nin no Kanojo',
                    'cover' => 'Kimi no Koto ga Daidaidaidaidaisuki na 100-nin no Kanojo-1701838883.png',
                    'synopsis' => 'Upon graduating middle school, Rentarou Aijou manages to confess to the girl he loves. Unfortunately, he gets rejected, making it his 100th rejection in a row. Having experienced heartbreak after heartbreak, he goes to a matchmaking shrine and prays with the hope of finally getting a girlfriend in high school. Suddenly, the god of the shrine appears, promising Rentarou that he will meet one hundred soulmates in high school.

Although skeptical at first, Rentarou quickly acknowledges the truth behind the god\'s words when two of his soulmates—Hakari Hanazono and Karane Inda—confess to him the very same day that they meet him. However, there was one detail that the god forgot to tell Rentarou: if any of his soulmates fails to get into a relationship with him, they will die. Now trapped in a matter of life and death, Rentarou decides to date all of his soulmates.

With a heart so big that it can be shared among one hundred girlfriends, Rentarou makes the most out of his unanticipated high school life, with the Rentarou family growing ever larger!',
                    'status' => 'available'
                ],
                'categories' => [$categoryMap['Comedy'], $categoryMap['Romance'], $categoryMap['Harem'], $categoryMap['Parody'], $categoryMap['School']]
            ],
            [
                'data' => [
                    'book_code' => 'BK007',
                    'title' => 'Komi-san wa, Comyushou desu',
                    'cover' => 'Komi-san wa, Comyushou desu-1701874091.png',
                    'synopsis' => 'It\'s Shouko Komi\'s first day at the prestigious Itan Private High School, and she has already risen to the status of the school\'s Madonna. With long black hair and a tall, graceful appearance, she captures the attention of anyone who comes across her. There\'s just one problem though—despite her popularity, Shouko is terrible at communicating with others.

Hitohito Tadano is your average high school boy. With his life motto of "read the situation and make sure to stay away from trouble," he quickly finds that sitting next to Shouko has made him the enemy of everyone in his class! One day, knocked out by accident, Hitohito later wakes up to the sound of Shouko\'s "meow." He lies that he heard nothing, causing Shouko to run away. But before she can escape, Hitohito surmises that Shouko is not able to talk to others easily—in fact, she has never been able to make a single friend. Hitohito resolves to help Shouko with her goal of making one hundred friends so that she can overcome her communication disorder.',
                    'status' => 'available'
                ],
                'categories' => [$categoryMap['Award Winning'], $categoryMap['Comedy'], $categoryMap['School']]
            ],
            [
                'data' => [
                    'book_code' => 'BK008',
                    'title' => 'Kono Subarashii Sekai ni Shukufuku wo!',
                    'cover' => 'Kono Subarashii Sekai ni Shukufuku wo!-1701874035.png',
                    'synopsis' => 'Kazuma Satou lives a laughable and pathetic life, being a shut-in NEET with no distinguishable qualities other than an addiction to video games. On his way home, Kazuma dies trying to save a girl from an oncoming truck—or so he believes. In reality, the "truck" was a slow-moving tractor, and he merely died from shock.

Waking up in limbo between death and heaven, Kazuma finds himself facing the arrogant goddess Aqua. Here, he must choose between two options: go on to heaven or be sent to a fantasy world that needs his help to defeat the Demon King. Initially unimpressed by the challenging prospect of fighting a Demon King, Kazuma changes his mind after Aqua tells him he can bring any one item he wants. What better choice does Kazuma have than the goddess standing before him?

Unfortunately, after the two arrive in their new world, two things become clear: Aqua is useless beyond belief, and life in this fantasy realm will be anything but smooth sailing. From paying for food and accommodations to trying to learn new skills, the duo\'s problems are just starting to take shape—and the arrival of eccentric allies may only make things worse.',
                    'status' => 'available'
                ],
                'categories' => [$categoryMap['Adventure'], $categoryMap['Comedy'], $categoryMap['Fantasy'], $categoryMap['Isekai'], $categoryMap['Parody']]
            ],
            [
                'data' => [
                    'book_code' => 'BK009',
                    'title' => 'Kuzu no Honkai',
                    'cover' => 'Kuzu no Honkai-1701838571.png',
                    'synopsis' => 'Unrequited love is a tragic circumstance with no simple resolution. It comes in many forms, yet each one shares the same debilitating feeling of inconceivable longing.

Hanabi Yasuraoka and Mugi Awaya are two high school students who appear to have the ideal relationship. They are the envy of their classmates, and it is easy to portray them as the classic example of high school sweethearts. Unbeknownst to friends and family, however, there is a side to their love veiled by hidden passions: their true affections lie elsewhere, and they use each other to physically sate their unreciprocated feelings.

Hanabi is in love with Narumi Kanai, her new homeroom teacher who is also her childhood friend. Mugi is in love with Akane Minagawa, who used to be his tutor when he was younger. Now teachers at the same school, Kanai and Minagawa begin to show an interest in one another. As a result, Mugi and Hanabi find solace in each other as victims of the same pain.

With little hope of their feelings being realized, these two students face a challenging predicament: cope with and move on from their lust, or become further entangled in their web of unrequited love.



Included one-shots:
Volume 1: Nyan Nyan Prelude
Volume 2: Nyan Nyan Serenade
Volume 3: Nyan Nyan Oratorio
Volume 4: Nyan Nyan Cantata
Volume 5: Nyan Nyan Andante',
                    'status' => 'available'
                ],
                'categories' => [$categoryMap['Drama'], $categoryMap['Romance'], $categoryMap['School']]
            ],
            [
                'data' => [
                    'book_code' => 'BK010',
                    'title' => 'MF Ghost',
                    'cover' => 'MF Ghost-1701873991.png',
                    'synopsis' => 'By the 2020s, cars with internal combustion engines have largely been phased out, replaced by self-driving electric and fuel cell vehicles instead. Though these fossil fuel-running cars are at risk of disappearing completely, a dedicated group in Japan known as the MFG strives to maintain interest in them through road races streamed online. With 10 billion yen at stake and more than three hundred drivers competing, only the Godly Fifteen—the top 15 racers in the circuit—have a chance at advancing and taking the coveted prize.

Fresh off a plane from England, 19-year-old Kanata Rivington is eager to take on the fourth installment of the MFG competition. Trained at an elite driving school in his home country, the half-Japanese driver vies for the competition\'s top spot in his hand-me-down Toyota 86 GT. Despite the disadvantages that come with a dated car, the newcomer is determined to become one of this year\'s Godly Fifteen.

Kanata adopts his father\'s last name, taking on the moniker "Kanata Katagiri." Conquering the Japanese racing circuit is only a stepping stone towards his real goal: discovering the whereabouts of his missing father.',
                    'status' => 'available'
                ],
                'categories' => [$categoryMap['Racing']]
            ],
            [
                'data' => [
                    'book_code' => 'BK011',
                    'title' => 'Nisekoi',
                    'cover' => 'Nisekoi-1701875073.png',
                    'synopsis' => 'When Raku Ichijou was young, he made a heartfelt promise to his childhood friend that if they were to meet again, they would marry each other. Ten years have passed since that fateful day, leaving Raku\'s memory of her faded. But he still holds a relic of their relationship together—a locked pendant, which his childhood friend holds the key to. He hopes to reunite with her one day, despite not remembering what she looks like.

Now a first-year student at Bonyari High School, Raku attempts to live a normal life, dreaming of becoming a public servant and marrying his crush Kosaki Onodera. However, this isn\'t as easy as it seems, as he is the unwilling heir to a large yakuza family, and Raku can\'t escape from his duties when the American Bee Hive gang wages war on his family\'s turf. In order to forge peace between the two feuding families, Raku is forced into a fake romantic relationship with Chitoge Kirisaki, the beautiful daughter of the Bee Hive\'s leader. The two quickly come to hate each other, but have to learn to live together and pretend to be deeply in love in order to keep their families at bay. 

However, Raku\'s quest for the key to his pendant isn\'t becoming easier as more girls—who were all involved with his pendant in some way—enter his life. Join Raku as he juggles his false relationship, maintains the balance between warring families, and unravels the identity of the girl who will unlock his heart.',
                    'status' => 'available'
                ],
                'categories' => [$categoryMap['Comedy'], $categoryMap['Romance'], $categoryMap['Harem'], $categoryMap['School']]
            ],
            [
                'data' => [
                    'book_code' => 'BK012',
                    'title' => 'Oshi no Ko',
                    'cover' => 'Oshi no Ko-1701838063.webp',
                    'synopsis' => 'Sixteen-year-old Ai Hoshino is a talented and beautiful idol who is adored by her fans. She is the personification of a pure, young maiden. But all that glitters is not gold.

Gorou Amemiya is a countryside gynecologist and a big fan of Ai. So when the pregnant idol shows up at his hospital, he is beyond bewildered. Gorou promises her a safe delivery. Little does he know, an encounter with a mysterious figure would result in his untimely death—or so he thought.

Opening his eyes in the lap of his beloved idol, Gorou finds that he has been reborn as Aquamarine Hoshino—Ai\'s newborn son! With his world turned upside down, Gorou soon learns that the world of showbiz is paved with thorns, where talent does not always beget success. Will he manage to protect Ai\'s smile that he loves so much with the help of an eccentric and unexpected ally?',
                    'status' => 'available'
                ],
                'categories' => [$categoryMap['Drama'], $categoryMap['Reincarnation'], $categoryMap['Showbiz']]
            ],
            [
                'data' => [
                    'book_code' => 'BK013',
                    'title' => 'Tantei wa Mou Shindeiru',
                    'cover' => 'Tantei wa Mou Shindeiru-1701839288.png',
                    'synopsis' => 'Kimihiko Kimizuka is a crisis-magnet. From getting caught up in a crime scene to accidentally witnessing a drug deal, trouble seems to find him around every corner. So it is no surprise when his rather mundane flight suddenly enters a state of emergency with a dire need of a detective onboard. Unfortunately, his attempt at avoiding trouble is foiled by a beautiful girl with silver hair who goes by the codename Siesta. Declaring herself a detective, she unceremoniously drags Kimizuka into the case as her assistant.

That incident spelled the beginning of an adventure around the globe that went beyond his wildest imagination. Putting their lives on the line, the two took down criminal organizations, prevented disasters, and saved thousands. But the curtain closed to their epic journey with Siesta\'s untimely death three years later.

Resolving to live an ordinary high school life this time, Kimizuka spends a year maintaining a low profile. However, as fate would have it, a girl with an uncanny resemblance to Siesta comes crashing into his life, threatening to throw his peaceful days into disarray.',
                    'status' => 'available'
                ],
                'categories' => [$categoryMap['Comedy'], $categoryMap['Drama'], $categoryMap['Mystery'], $categoryMap['Romance']]
            ],
            [
                'data' => [
                    'book_code' => 'BK014',
                    'title' => 'Tensei shitara Slime Datta Ken',
                    'cover' => 'Tensei shitara Slime Datta Ken-1701929117.png',
                    'synopsis' => 'It is just another ordinary day for Satoru Mikami. The sun is shining brightly on the streets of Tokyo, and he is in the midst of a discussion with his colleagues when suddenly he gets stabbed by a passing robber. The average 37-year-old corporate worker is now at death\'s door, and he has only one regret—dying a virgin. Fading out, he is startled by a mysterious AI-like voice reciting commands. 

Satoru abruptly wakes up in the middle of a strange cave, but something odd has happened: he is now a goop of slime! Thanks to his new body, he has acquired the skill to absorb anything and obtain its appearance and abilities. While testing out his newfound powers and exploring the cave, he stumbles upon a massive dragon named Veldora, who has been sealed away for the past three hundred years. After quickly befriending the beast, Satoru decides to help him escape; in exchange, Satoru is bestowed a new name: "Rimuru Tempest."

Wishing to avoid a life like his boring and mundane past, Rimuru is about to set out on a grand quest that will change his own destiny and the fate of his new world.',
                    'status' => 'available'
                ],
                'categories' => [$categoryMap['Award Winning'], $categoryMap['Fantasy'], $categoryMap['Isekai'], $categoryMap['Reincarnation']]
            ],
            [
                'data' => [
                    'book_code' => 'BK015',
                    'title' => 'Tokidoki Bosotto Russia-go de Dereru Tonari no Aalya-san',
                    'cover' => 'Tokidoki Bosotto Russia-go de Dereru Tonari no Aalya-san-1701874150.png',
                    'synopsis' => 'Smart, refined, and strikingly gorgeous, half-Russian half-Japanese Alisa Mikhailovna Kujou is considered the idol of her school. With her long silver hair, mesmerizing blue eyes, and exceptionally fair skin, she has captured the hearts of countless male students while being highly admired by all others. Even so, due to her seemingly unapproachable persona, everyone remains wary around the near-flawless girl.

One of the few exceptions is Alisa\'s benchmate Masachika Kuze, a relatively average boy who spends his days watching anime and playing gacha games. Despite his nonchalant demeanor, Masachika is the sole student to receive Alisa\'s attention. Unable to be fully honest, Alisa is frequently harsh on Masachika and only expresses her affection in Russian. Unbeknownst to her, however, Masachika actually understands the language yet simply pretends otherwise for his own amusement.

As the odd pair continues to exchange witty and playful remarks, their relationship gradually grows more romantic and delightful—and Alisa might finally learn to freely convey her true feelings.',
                    'status' => 'available'
                ],
                'categories' => [$categoryMap['Comedy'], $categoryMap['Romance'], $categoryMap['School']]
            ],
        ];

        foreach ($books as $book) {
            $createdBook = Book::create($book['data']);
            $createdBook->categories()->attach($book['categories']);
        }
    }
}
