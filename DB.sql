-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 08, 2022 at 01:47 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `get_together`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `content` varchar(20000) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `category` varchar(1000) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `del_flag` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `content`, `place`, `date`, `category`, `user_id`, `del_flag`) VALUES
(1, '英語学習会', 'すでに英語学習をしていたり、これからしようと思っている皆さん\r\n英語を一緒に勉強する仲間はいますか？\r\n\r\nそして今、過去の自分と同じ状況にいる方が多いなと感じます。\r\nこんな時期だからこそ、\r\n同じ目標に向かって頑張れる仲間がいたらいいなと思ったので\r\nこのイベントを始めました。\r\n\r\n『英語を一緒に勉強できる友達が欲しい！』\r\n\r\n『普段関わらない人たちと交流を深めたい！』\r\n\r\n『職場や学校以外での友人や知人を増やしたい！』\r\n\r\n『実用的な英語を学びたい！』\r\n\r\n目的はそれぞれですが好奇心と向上心に溢れた方にぴったりのイベントです\r\n\r\n', '渋谷駅周辺', '2021-12-18', '英語', 1, 0),
(21, '読書カフェ会', '本を読む、感想をシェアする、本を通じて交流する、などを目的とした会です。', '練馬駅スターバックス', '2021-12-26', '読書', 1, 0),
(43, '読書', '読書会', '池袋駅', '2022-01-28', '読書', 15, 0),
(44, 'The World of AI and Machine Learning - Open Discussions', 'Details\r\nIn the world of AI, behavioural predictions are leading the charge to better machine learning.\r\n\r\nThere is so much happening in the AI space. Advances in the economic sectors have seen automated business practices rapidly increasing economic value. While the realm of the human sciences has used the power afforded by computational capabilities to solve many human based dilemmas. Even the art scene has adopted carefully selected', 'on line', '2022-01-29', 'ディスカッション', 16, 0),
(45, '第126回　オンライン英検1級1次試験対策勉強会', '当勉強会も11シーズン目を迎えました。\r\n\r\n英検1級受験を目指して勉強会を開催します。\r\n\r\n一次試験対策のみ、時間は2時間です。\r\n\r\n日時：2022年1月8日（土）14:00～16:00　（途中までの参加、途中からの参加OK です）\r\n\r\n場所：zoom\r\nhttps://us02web.zoom.us/j/88230892334\r\n\r\nパスワードはいつものです(初めて参加の方は事前にお問い合わせください)。', 'オンライン', '2022-01-22', '勉強会', 16, 0),
(46, '囲碁ファースト飯田橋でチェス新年会', '囲碁ファースト飯田橋でチェス会を開催します。\r\n必ずマスクを着用ください。\r\n\r\n料金は下記通りです:\r\n男性: 1200円\r\n女性: 1000円\r\n学生: 700円\r\n\r\nチェスセットは囲碁ファーストに提供されますので、ご持参しなくて良いです。\r\n\r\n対局は非公式です。\r\n\r\n初心者も大歓迎です。\r\n\r\nhttps://goo.gl/maps/wSz3swEtnhd9kC6u5', '飯田橋', '2022-01-08', 'チェス', 16, 0),
(47, '【リモート開催】SAFe Remote Meetup in Japan 2022年1月', '第25回 SAFe Meetup Japanを、2022/1/26(水) 19:00よりリモート開催致します。\r\n\r\n今回のミートアップは、新年最初のミートアップということで、ゲストを迎えてのセッションにしたいと思います。詳細は追ってご連絡させて頂きます。\r\n\r\n2022年最初のミートアップでお会いできるのを楽しみにしています！\r\n\r\n古場', 'オンライン', '2022-01-08', '国際交流', 16, 0),
(48, 'Yokohama English Conversation Cafe 英語と日本語で会話しましょう', '皆さんと再び直接会って会話をしたいと思っていますが、それを決めたところでまた報告します。\r\n\r\n英語または日本語を話す練習をして、他の文化についてもっと学びたいですか？ 英会話カフェにご参加ください！ 国際的なグループ（オーストラリア、シンガポール、スイス、香港、アメリカ）なので、「日本語、英語などで話してみたい！」「新しい友達を作りたい！」という誰もが大歓迎です。\r\n\r\n*すべてのレベルの英語/日本語話者を歓迎します。\r\n\r\n（＾ー＾）/ お会いできるのを楽しみにしています！\r\n\r\nイベントスタート Event Start: 19:30\r\nズームリンク Zoom Link: リンクを受け取るために予約してください。RSVP to receive the link\r\n', '横浜', '2022-01-08', '英会話', 16, 0),
(49, '20代限定【現地開催】自己分析×もくもく会【メモの魔力】', '●当日の流れ\r\n\r\n１．あいさつ（自己分析の進め方の解説）\r\n２．お互いに自己紹介\r\n３．各自もくもくタイム（60分～90分）\r\n４．成果を共有\r\n５．まとめ\r\n\r\n毎回、自己分析もくもく会は和やかな雰囲気で進み、笑い声も多く盛り上がります。\r\n明るく楽しい雰囲気の中、各々の価値観や今考えていることなど会話が広がり、刺激的な時間を共有出来ます。\r\n\r\n●持ち物\r\n\r\nノート（A5以上推奨）、筆記用具\r\n\r\n●こんな人が参加しています♪\r\n\r\n参加者は基本的に社会人の20代ですが、中には学生の方も時々参加されます。\r\n\r\n◇自己分析に興味がある\r\n◆自分の軸を見つけたい\r\n◇自己肯定感を高めたい\r\n◆自分の価値観を明確にしたい！\r\n◇仕事のモチベーションを上げたい！\r\n◆新しい事にチャレンジしたい！\r\n◇今のキャリアに不安がある\r\n◆同じ志向を持った人と出会いたい！\r\n◇自分の考えをアウトプットしたい\r\n◆変わり映えしない毎日に変化を加えてみたい\r\n◇仕事終わりにリフレッシュ♪\r\n\r\nどんな理由でもOK！\r\n自己分析や性格診断に少しでも興味がある方、大歓迎です♪\r\nコーヒーや紅茶を飲みながらコミュニケーションをとり、自己分析に触れる機会を増やしましょう☆', '岩本町', '2022-01-15', '読書', 16, 0),
(50, 'Sake & Cheese - Discover Japanese Sake With Food Pairing', 'Sake meets cheese in every way and form.\r\n\r\nWhat can you expect from this event?\r\n- A selection of craft sakes from exciting breweries, covering the whole spectrum of sake tastes.\r\n- A curated cheese selection and dishes made with (you guessed it!) cheese, prepared on-site by cheese expert and Brazilian journalist Roberto.\r\n- A fun and casual atmosphere for sake-curious and experts alike.\r\n\r\nCost?\r\n- ¥5,000 (pre-paid via Meetup)\r\n- ¥5,500 (cash at the door)\r\n\r\nWhere and when?\r\n- January 1/29 18:00-21:00\r\n- Venue to be announced\r\n\r\n日本酒とチーズの出会い。\r\n\r\nこのイベントで期待できることは？\r\n- エキサイティングな酒蔵からのクラフト日本酒のセレクションを試飲。\r\n- チーズの専門家でありブラジル人ジャーナリストのロベルト氏による、厳選されたチーズのセレクションと、チーズを使った料理を楽しむ。\r\n- 日本酒に興味のある方も、そうでない方も一緒に楽しめるカジュアルな雰囲気。\r\n', '池袋駅周辺', '2022-01-08', '飲み会', 16, 0),
(51, 'ボードゲームインターナショナルパーティ = Board Game International Party', '皆でボードゲームを通じて国際交流しませんか。\r\n\r\n今夜はたくさんの人達とたくさんのボードゲームを楽しみましょう。\r\n\r\nボードゲームは有名作品、人気作品を中心に、2名で楽しめるものから大勢で楽しめるものまで、10分程度で遊べるものから1時間以上かかるものまで、初めての方でもすぐに楽しめるものから本格的なものまで、さらに日本語バージョンだけでなく英語バージョンも多数揃えております。\r\n\r\n午後7時からはボードゲームオーガーナイザーも参加します。\r\n\r\n交流会はフリータイムで入退場自由です。また相席自由のためお一人でのご参加も大歓迎です。ぜひ気軽にお越しください。\r\n\r\n☕️ ご注意\r\n- おひとり様大歓迎です\r\n- ただし出来る限り一緒にプレイするご友人とお越しください。\r\n', '小川町', '2022-01-21', 'ボードゲーム', 16, 0),
(52, '初心者向けヨガの会', 'こちらのクラスは日本語 / Englishで開催されます。\r\nThis class will be lead in Japanese and English.\r\n\r\n【 New Student Special 】\r\n初回体験1000円 ☆\r\n\r\nThe room E-801 on the 8th floor.\r\nお部屋は8階801です☆', '渋谷駅', '2022-01-14', 'ヨガ', 16, 0),
(53, '読書', '読書会', '池袋駅周辺', '2022-01-29', '読書', 1, 0),
(54, '読書会', '読書会を行います！', '池袋駅周辺', '2022-01-08', '読書', 7, 0),
(55, 'ショートムービーを作ろう', '動画編集ソフトを使って短いムービーを作ります', '高山市市民体育館', '2022-01-15', '映画', 7, 0),
(56, '手毬ワークショップ', '手毬を作るところから遊び方まで、一緒にやってみませんか？\r\n\r\n初心者大歓迎です。\r\n\r\n手毬について幅広く学びましょう！\r\n\r\nStart and End point: corner of Bergen Ave and Devon St.\r\nBreak: Matera’s on Park in Rutherford, NJ at 100 pm\r\n\r\nBelow is link to what a typical ride might look like\r\n\r\nhttps://ridewithgps.com/trips/80740734\r\n\r\nFeel free to join the group at any point on the bike ride', '高山市市民体育館', '2022-01-15', '伝統', 7, 0),
(57, '英検勉強会', '英検対策で一緒に勉強しませんか？', '池袋駅周辺', '2022-01-29', '勉強会', 7, 0),
(58, '自転車ツーリングの会（初心者歓迎）', '一緒に高尾山でサクリングしましょう！\r\n\r\n自慢の自転車もぜひ自慢してください〜\r\n\r\nこだわりの装備品などもご紹介お願いします！', '高尾山', '2022-01-22', 'スポーツ', 7, 0),
(59, '読書会', '読書会を開催します。自分の好きな本を持ち寄りましょう', '池袋駅スターバックス', '2022-01-15', '読書', 18, 0),
(60, '読書会', '読書会を行います！', '池袋駅周辺', '2022-01-15', '読書', 19, 0),
(61, '読書会', '読書会', '池袋駅周辺', '2022-01-15', '読書', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0' COMMENT '権限',
  `insert_date` date DEFAULT NULL COMMENT '挿入日時',
  `update_date` date DEFAULT NULL COMMENT '更新日時',
  `del_flag` int(11) DEFAULT '0' COMMENT '削除フラグ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `insert_date`, `update_date`, `del_flag`) VALUES
(1, 'mai', 'mai.minakuchi@gmail.com', '$2y$10$HzcJWAzEO6MctaPpNsUGvu4TZbVlgfokLjpwELbywy0hrGo30EwsW', 0, NULL, NULL, 0),
(4, 'chiikawa', 'chiikawa@chiikawa', '$2y$10$TWDZ9NzRvOiAzqwMOsBtyu0eF71sQuLgPPBiPdBRRx3xzA6Pnz/zq', 0, NULL, NULL, 0),
(6, 'hachiware', 'hachiware@hachiware', '$2y$10$TF/Zvm41Vujau6fBSrXRjuQE9aHHpUGOPkz0jpdLWKsz6YTAo/iz6', 1, NULL, NULL, 0),
(7, 'kanri', 'kanri@co.jp', '$2y$10$Z3xIpIGSCfZ2PKeVKkehU.3Kw3jB29HSxlcp0KSwxzICXncTfMB0C', 1, NULL, NULL, 0),
(8, 'mai', 'mai.minakuchi@gmail.com', '$2y$10$505EtdIbDTQ/DHf.WDg.4OzXfyKT6SgU5x866B2DzsQ8Qyf3Gzlp.', 1, NULL, NULL, 0),
(20, 'test', 'test@test', '$2y$10$Ck7k6Wys5XRJe8VQku9ya.vc.bnd8loY1shB4tWyQ7aje1QieWrZe', 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_event`
--

CREATE TABLE `user_event` (
  `user_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_event`
--

INSERT INTO `user_event` (`user_id`, `event_id`) VALUES
(1, 2),
(5, 25),
(7, 1),
(6, 1),
(15, 7),
(7, 21),
(18, 59),
(20, 55);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
