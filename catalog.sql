SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `brand` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `category` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `product` (
  `id` int UNSIGNED NOT NULL,
  `designation` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `stock` int UNSIGNED NOT NULL,
  `released_at` datetime DEFAULT NULL,
  `brand_id` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `product_category` (
  `product_id` int UNSIGNED NOT NULL,
  `category_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`);

ALTER TABLE `product_category`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `category_id` (`category_id`);

ALTER TABLE `brand`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `category`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `product`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `product`
  ADD CONSTRAINT `product_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_category_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

INSERT INTO category(title, description) VALUES 
('Ducimus voluptatem ducimus', '<p>Doloribus voluptates exercitationem perferendis earum. Dolorum et nostrum similique inventore sit beatae animi. In doloremque voluptas non tempore sed et modi explicabo. Nisi pariatur odio ipsam mollitia labore.</p>'),
('Consectetur consequatur necessitatibus', '<p>Illum beatae voluptas suscipit dolor molestiae voluptatem qui. Et rerum consequuntur et neque.</p>'),
('Ut in', '<p>Est natus voluptatum neque omnis. Aut tenetur dolorum sint sed ut. Dolorum nihil ut et atque.</p>'),
('Quia repudiandae facere', '<p>Quaerat repellendus ullam voluptatum dolore ducimus. Deserunt repellat voluptates deleniti alias sint dicta. Quam dolor ullam debitis aperiam. Non quis doloremque assumenda a ut dolorem.</p>');

INSERT INTO brand(title, description) VALUES 
('Fahey and Sons', '<p>Voluptate qui enim tenetur quia ab magnam exercitationem eum. Ut ut mollitia autem quis. Maiores quia consequuntur adipisci minima ex. Esse sit molestiae ut.</p>'),
('Dietrich PLC', '<p>Ut omnis ut perferendis repellendus sint laboriosam molestiae. Aliquam quaerat voluptatum vel adipisci. Inventore ad ratione dolores sit autem.</p>'),
('Hettinger Ltd', '<p>Voluptatibus aut qui tempora distinctio illo. Explicabo dolorum repudiandae maiores nisi. Vel ut quia reprehenderit in non voluptates. Debitis eos quaerat illum expedita possimus.</p>'),
('Dickinson, Christiansen and Cremin', '<p>Beatae voluptas facilis voluptas nisi harum. Neque debitis ut libero officia vitae. Ullam aut odit maiores non expedita. Neque facere sed dolorum voluptatem odit eveniet illo.</p>'),
('Leuschke-Volkman', '<p>Quidem eaque autem voluptate omnis consequatur expedita. Ex autem ipsam perferendis quae est in sunt. Quidem necessitatibus ipsa voluptatem omnis.</p>'),
('Hilpert, Kihn and Torp', '<p>Exercitationem autem dolorem sed consequatur. Perspiciatis dolor officiis repellat dolorem deserunt. Soluta error quia placeat eos.</p>'),
('Harvey, Cummings and Daugherty', '<p>Odit non accusamus nihil quas adipisci perspiciatis. Dolorem architecto odit sit quo enim facilis dolor. Iste id maxime ut esse autem reiciendis. Est magnam rerum reprehenderit est aut.</p>'),
('Lindgren-Armstrong', '<p>Voluptatum sed rerum ea. Ut itaque iste dolorum amet rerum ad exercitationem. Numquam sequi blanditiis placeat vel inventore omnis soluta. Dolorem ut id quis odio sit non cum.</p>'),
('Botsford Ltd', '<p>Est nobis eaque odio ut sed. Ut odio eligendi temporibus quia. Aperiam alias cum non sequi possimus a est. Eaque minus commodi ipsa qui eligendi eos.</p>'),
('Wintheiser-Spencer', '<p>Veniam vitae quia tenetur corporis et laboriosam distinctio reprehenderit. Enim voluptas voluptatem quidem. Molestiae est quae sunt dolores et. Consequuntur voluptates commodi voluptatem itaque.</p>');

INSERT INTO product(designation, description, price, stock, released_at, brand_id) VALUES 
('Error neque sint repellat mollitia quam', '<p>Voluptate voluptas sunt harum placeat. Sunt consectetur quo voluptas. Et error magni dolorem vel enim consequatur quis unde.</p>
<p>Qui non nesciunt voluptatem enim possimus dolor consequuntur. Et blanditiis aperiam aut in beatae nesciunt rem.</p>
<p>Autem ipsum sequi quae saepe. Atque eum cupiditate et et deserunt vel. Porro nulla commodi voluptatibus qui porro mollitia enim.</p>
<p>Nulla aut perspiciatis aliquid excepturi dolores vel excepturi facere. Voluptates officia nesciunt et quia omnis fuga. At illum deserunt fugit recusandae tempore eos cum provident. Quas quo et vero facilis animi quia qui. Eligendi error qui distinctio nisi.</p>
<p>Dicta ut laborum ut nobis tempore est repellat. Et adipisci aut quaerat velit. Et neque fugiat molestiae velit sint. Voluptas dolores facilis neque earum mollitia voluptatibus.</p>
<p>Voluptas quia corporis laudantium alias unde. In quaerat pariatur soluta ea error. Sunt aliquam consectetur unde voluptas ipsa.</p>', 434.21, 175, '2019-02-24', 4),
('Ipsum iure quia ex commodi necessitatibus', '<p>Illum nihil possimus voluptas ad aliquam. Illum molestias neque harum quo. Sed ut occaecati sit nisi. Sit vero quibusdam atque quos est.</p>
<p>Velit similique ut omnis mollitia error odit. Inventore facere exercitationem a architecto qui. Natus officiis suscipit optio ex laudantium aut aut alias. Sint quis provident excepturi et voluptatum hic quidem corporis.</p>
<p>Blanditiis eos ipsam illo maxime id. Rerum omnis aut repellat ut et non.</p>', 14.18, 71, '2019-10-25', 9),
('Velit eum sit libero architecto quia nam', '<p>Aut et enim ipsum cupiditate adipisci. Sed repudiandae omnis commodi illo sit nisi. Qui amet ut delectus laborum nihil.</p>
<p>Voluptatem id et perferendis quo at molestiae labore et. Earum repellendus ut assumenda aut.</p>
<p>Sit sed eum reiciendis qui laborum. Sunt sed soluta pariatur sit tempore et quam. Alias omnis sit et nihil omnis.</p>', 344.84, 178, '2016-09-19', 5),
('Necessitatibus ipsum voluptatem aut similique voluptatem', '<p>Est iusto quae repudiandae cumque autem rerum voluptas. Corporis est quod dolores repudiandae cumque enim. Inventore soluta nobis dolorum veritatis architecto ducimus.</p>
<p>Voluptatibus odit atque minima vero dignissimos. Perspiciatis ut rem et qui aspernatur sint. Voluptatem et impedit aut numquam quia a similique.</p>
<p>Assumenda nobis ut ratione magnam nihil. Rerum velit ea praesentium doloremque dolor. Omnis et velit voluptas nisi dolorem dolores repudiandae.</p>
<p>Error et ab unde voluptas omnis ea. Voluptates porro nobis facilis nihil molestias inventore. Et repellendus delectus doloribus cupiditate corrupti est sed mollitia.</p>
<p>Consequuntur ratione id tempora odio et minus sed. Qui iusto aut at. Eligendi distinctio quam omnis et non. Id quaerat cupiditate excepturi voluptates ea soluta. Libero voluptates voluptas nihil nulla.</p>', 668.87, 145, '2018-02-18', 4),
('Aut expedita nesciunt similique eum voluptas', '<p>Omnis corrupti dolores quae facilis molestias voluptatibus. Ut adipisci deserunt voluptas quos sit deserunt. Cupiditate voluptate illo possimus provident. Reprehenderit facere earum sed at fuga.</p>
<p>Et enim molestiae sint omnis sed. Est distinctio ullam ut nesciunt et. In aut velit ad delectus. At officia quidem praesentium similique qui consectetur ut.</p>
<p>Voluptas eum laudantium aut labore modi at itaque. Est eos incidunt necessitatibus. Consequatur excepturi et nihil exercitationem.</p>
<p>In in qui repudiandae enim eveniet. Sequi molestiae esse repellendus laudantium veniam ut. Magni pariatur non quidem perferendis dolores in placeat. Iste sit minus et aut commodi nesciunt voluptatum. Expedita ratione et veritatis sint occaecati et.</p>
<p>Veniam minus qui corrupti eum. Sed aut molestias excepturi numquam qui eveniet. Eveniet nihil laborum autem reiciendis enim qui eos illum.</p>
<p>Cumque voluptas atque est sit aut. Sunt sunt natus cumque quia id quis. Quos recusandae vel tenetur delectus. Quod qui et officiis laudantium est velit. Mollitia quasi debitis possimus.</p>', 831.97, 84, '2018-06-17', 1),
('Quidem maiores aliquid atque consequatur aut possimus', '<p>Rem ex reiciendis placeat blanditiis dolores est. Alias quam tenetur amet ex. Aliquid facere incidunt aut. Et eum quas a inventore. Explicabo nostrum soluta est beatae facilis ducimus soluta.</p>
<p>Voluptas provident magnam quae sunt quisquam. Est minima illum rem voluptas mollitia voluptas nihil. Eum eveniet alias ut enim error aspernatur. Iure dolorem molestiae officiis maxime.</p>
<p>Perspiciatis neque dolore ea corrupti architecto id incidunt. Voluptatem maxime impedit excepturi veritatis voluptatem dicta laboriosam aut. Culpa magnam alias ipsa blanditiis doloribus. Qui id sunt dignissimos minus et commodi.</p>', 813.1, 34, '2017-01-07', 5),
('Magni itaque iusto rem omnis quod debitis', '<p>Voluptas facilis velit at facilis delectus quasi. Laborum voluptatem perspiciatis rerum adipisci tempore qui illo. Accusamus laudantium quia velit. Voluptates earum deserunt nisi. Doloribus asperiores id iusto et.</p>
<p>Quibusdam iste debitis et a impedit. Rerum non animi repellendus et hic. Quia dolores sit repellat eum exercitationem. Consectetur quis aut ut dolores ratione.</p>
<p>Dolor quia accusantium quis adipisci alias cum. Error ut quod in laudantium. Omnis nihil quibusdam porro perspiciatis aut quia. Pariatur eveniet officia vitae officia inventore.</p>
<p>Nihil dolorum unde qui perferendis sunt repudiandae. Sit excepturi quasi aut voluptatem vitae ex. Tempore et vero distinctio deleniti accusantium et quasi laboriosam.</p>
<p>Praesentium sed earum molestiae ut ea voluptas qui. Aut autem cumque odio nobis.</p>
<p>Sunt non omnis reprehenderit unde eum quae consequatur eos. Quae laudantium cupiditate deserunt adipisci. Vel autem error omnis quia recusandae. Accusamus voluptate ut id ut.</p>', 796.12, 71, '2015-09-23', 2),
('Repellat eaque rem earum corporis blanditiis minus sed', '<p>Provident provident quod debitis et et est quia. Autem et dolores et minus odit. Consequatur totam maiores molestiae harum voluptatibus saepe. Dolorum optio aut quod beatae.</p>
<p>Cupiditate sint tempore explicabo molestiae saepe enim quasi. Dolorem in minus occaecati reiciendis nobis rerum eligendi. Aut occaecati dicta eligendi vitae facilis natus adipisci. Et consequatur aut quia at corporis aperiam ipsam.</p>
<p>Nulla minima ipsum recusandae veritatis cum nemo dolorum qui. Voluptas perferendis maiores odio non qui ipsum sint. Ut et molestias natus maxime tempore.</p>
<p>Dolores impedit et et necessitatibus quia quaerat quos. Facere sequi nostrum quo autem molestias consequatur nihil.</p>
<p>Beatae maxime ut quod aliquid laudantium modi. Quidem expedita aut sit ut maiores reiciendis sunt fugiat. Assumenda dolores rem ea aut placeat asperiores officia. Id voluptates odio error eum.</p>', 205.6, 182, '2017-05-09', 4),
('Magnam corporis suscipit officiis officia nostrum magnam in voluptatem', '<p>In doloremque perferendis earum nesciunt eaque sunt aliquam. Error culpa harum molestias voluptates vitae.</p>
<p>Est est a adipisci atque cupiditate. Aliquam dicta ad eligendi quibusdam voluptas. Aut libero non optio minima dolorum similique.</p>
<p>Doloribus eaque amet laboriosam dolorem eos labore eos. Aspernatur corrupti cupiditate error qui rerum molestiae. Reiciendis commodi est nam ad.</p>
<p>Qui reprehenderit consectetur dignissimos et ipsam. Suscipit dolores totam in omnis. Voluptatem quia voluptas similique.</p>', 236.05, 132, '2017-03-19', 7),
('Qui architecto consequatur quis magni alias pariatur atque', '<p>Facere cupiditate doloremque quaerat. Voluptas vitae quam natus et. A voluptas sit placeat dolor.</p>
<p>Labore maxime sit iste ad. Porro sapiente reprehenderit quidem ea. Dolores dolore iste perspiciatis.</p>
<p>Et velit iure aliquam esse et nisi. Aut fugit deleniti a omnis iste. Similique exercitationem ipsum provident odio deserunt.</p>
<p>Unde facilis inventore nesciunt aut placeat. Et est quo tempora. Est sunt rem voluptas alias non. Ut alias fugit sapiente ullam maiores.</p>
<p>Quam ipsam non quisquam architecto id nesciunt id nisi. Aliquam ipsam minus nesciunt consequatur ullam ipsam natus. Ipsum aut sunt est aut aperiam tempora excepturi.</p>
<p>Voluptates dolore vitae nobis possimus ducimus aut. Molestiae itaque atque consequatur et. Aperiam quia rerum id voluptas.</p>', 782.09, 99, '2015-07-13', 9),
('Sequi ut velit minus voluptates aliquid quaerat', '<p>Rerum et aspernatur qui autem natus minus. At voluptate eum itaque aspernatur est eligendi nihil soluta. Omnis nostrum consequuntur a aperiam aut.</p>
<p>Rem omnis hic debitis magni omnis atque. Fuga placeat temporibus esse omnis earum est. Pariatur ab aperiam repudiandae veritatis rem architecto rem. Et aperiam quis enim odit.</p>
<p>Voluptates sit natus veritatis magnam excepturi est quia. Qui culpa qui non ut ullam aut qui. Assumenda ipsam rerum earum. Ut ut mollitia quibusdam ut. Maiores necessitatibus qui sit nulla omnis quod.</p>
<p>Eaque ut aut consequatur aut neque. Rerum provident delectus consequatur ut ratione incidunt tempore. Neque at ipsum eveniet id vitae facilis.</p>', 287.22, 199, '2017-09-18', 6),
('Ad aut eum cum incidunt illum nam et sunt alias', '<p>Explicabo provident ipsam esse nam vel sed vitae officiis. Laboriosam et explicabo delectus nisi. Velit occaecati autem soluta velit velit dolorem. Nam consequatur nobis voluptates non aliquid.</p>
<p>Voluptas et rerum magni nesciunt voluptas numquam. Laborum repellendus corrupti hic accusamus. Autem quae consequatur molestiae unde qui nemo molestiae.</p>
<p>Earum sed animi ab adipisci sit. Rem quo quia veniam reprehenderit. Cupiditate exercitationem nihil ipsa aut quo voluptatibus.</p>
<p>Et sit voluptatem amet non. Fuga neque ut accusantium. Sit et natus dolorem maxime aliquam aliquid dolorum. Est porro consequuntur blanditiis ut temporibus eum ut.</p>
<p>Rerum facere vero omnis necessitatibus temporibus et ea. Rerum dignissimos soluta nesciunt voluptatibus cumque commodi. Rem incidunt laboriosam a velit nulla. Qui deserunt minus quasi voluptas officiis aut velit.</p>
<p>Consectetur et eum voluptas qui. Repellat maxime sit praesentium et nemo quo fugiat. Culpa libero magni deleniti sapiente reiciendis. Vitae enim facilis et illum labore.</p>', 277.85, 67, '2015-03-11', 9),
('Non molestias labore repellat iste ea dolore nam', '<p>Aperiam libero exercitationem consequuntur in nisi. Harum pariatur ut quos dolorem ea in assumenda.</p>
<p>Voluptates dicta et aut modi. Odio quam consequatur tempora voluptas nihil quos. Sit aliquam veritatis architecto nam quidem exercitationem molestiae. Veniam officia repellat et ut et eos.</p>
<p>Aut perferendis eligendi veniam quam. Eius assumenda illo eos voluptas. Laborum cumque voluptate temporibus non dolores nostrum.</p>', 313.93, 123, '2019-01-24', 9),
('Nesciunt placeat fugiat ut nesciunt soluta optio hic', '<p>Non laboriosam id dolor fuga esse autem consequatur. Occaecati iste incidunt cumque dolorem natus.</p>
<p>Harum tenetur minima aliquid qui. Rerum deserunt quos necessitatibus qui mollitia enim aut fuga. Quod non error corporis sit nesciunt. Repellat delectus et dolore commodi impedit.</p>
<p>Libero omnis tenetur quo unde. Et velit eos explicabo in aut reiciendis soluta. A nemo et nisi aperiam laborum velit consectetur.</p>', 743.52, 91, '2017-03-28', 6),
('Voluptas possimus iure autem rerum', '<p>Qui vel aspernatur voluptatem voluptatum. Rerum odio ut repellendus commodi. Voluptas quod hic voluptas adipisci. Ipsum ad et sunt quos enim cumque.</p>
<p>Optio asperiores temporibus nisi ipsum eos qui quis. Fugit vel repellat beatae possimus consequatur soluta quis. Enim ipsum saepe at incidunt. Architecto sed non cupiditate.</p>
<p>Explicabo architecto minima mollitia. Nam commodi placeat inventore ut atque rerum. Omnis molestias nam rerum minima amet suscipit. Ut id minus ut ut.</p>
<p>Consequatur ut ipsam pariatur laboriosam facilis vel. Omnis sit quia iure ipsa.</p>
<p>Eius magnam non et cupiditate. Eos ut necessitatibus vel exercitationem. Sed inventore dicta eius ut accusantium vel sapiente. Occaecati enim eos autem sed ut.</p>', 278.52, 177, '2017-02-01', 1),
('Neque id non nesciunt qui', '<p>Culpa quo dolor voluptas ipsum voluptas consectetur. Et ullam qui et sunt placeat qui dolorem.</p>
<p>Quis esse eos natus id. Maiores amet autem velit similique aperiam corporis. Accusamus minima quia maxime delectus et et. Magnam et ducimus iste ea quod. Consequatur sed laboriosam quam sint.</p>
<p>Occaecati rem voluptas expedita. Odit sunt numquam et a culpa quos unde.</p>', 833.79, 132, '2019-06-12', 8),
('Consequatur tempora eveniet suscipit in', '<p>Qui deleniti veritatis autem natus. Repellendus omnis qui et debitis in sint voluptates.</p>
<p>Incidunt soluta voluptatum quia reiciendis. Quos ipsa nemo et molestiae. Quis deserunt quod qui ut vel.</p>
<p>Beatae voluptas est molestiae consequatur est quaerat quae. Blanditiis enim itaque voluptatem. Animi quas debitis id sunt dolore eos veniam. Qui fugiat magnam suscipit quaerat vel qui quas quasi.</p>
<p>Nostrum voluptas ut labore omnis. Asperiores et quo totam.</p>', 851.2, 81, '2019-12-23', 9),
('Tempora soluta molestiae quos sit consequatur rerum minus', '<p>Dicta totam et reprehenderit sed iusto aut vel. Minus dignissimos aut magnam voluptatem consequatur libero. Sint temporibus veritatis sed est.</p>
<p>Omnis dolores voluptates vel ipsa consequuntur et accusamus aliquam. Qui voluptas qui eum explicabo. Similique natus aliquid quisquam et. Fugit veniam quas pariatur consequatur architecto impedit quod. Doloremque fugiat explicabo earum autem nesciunt.</p>
<p>Officia nesciunt ullam libero. Placeat in dolorem nulla sed aliquid. Neque molestias rerum ipsum vel sit tempora.</p>', 508.61, 6, '2019-08-30', 4),
('Accusantium repudiandae quia eveniet quas consequatur animi sit totam', '<p>Voluptatum minus dolor quia quidem eos et placeat. Iste magnam explicabo harum pariatur. Fugiat quod laboriosam doloremque eum quibusdam dolor maiores. Perferendis sint doloribus repellat aliquam ducimus quibusdam.</p>
<p>Id quasi eos et expedita numquam quia ea. Voluptatem voluptas a molestias asperiores sunt. Voluptatem qui vero recusandae ipsum enim dolorem a ut.</p>
<p>Minus necessitatibus consequatur optio natus quis vel est. Molestiae occaecati aut nisi explicabo est qui. Nostrum voluptas rerum quas non expedita odit repudiandae. Corporis itaque sapiente quaerat laboriosam.</p>
<p>Quae ut nam est consectetur. Molestiae expedita officia et quaerat. Nisi ipsam ipsum maiores blanditiis porro. Ullam sit deserunt nobis consequatur.</p>
<p>Ut et exercitationem excepturi ut. Molestiae non facilis possimus natus repellat nemo quod. Nihil possimus ea aliquam autem cum quia aliquid. Ut iste veritatis modi aliquam. Natus voluptatem sapiente consequatur cupiditate molestiae qui blanditiis.</p>', 905.5, 125, '2015-03-14', 8),
('Aut quos laboriosam molestias molestias in deserunt reiciendis illum', '<p>Eius est hic eum cupiditate. Voluptatem officia iure nam ut inventore culpa iusto dolore.</p>
<p>Eius nesciunt amet quidem distinctio cum inventore et. Quo laudantium sed fugit repellendus doloremque deserunt. Numquam autem quo delectus ratione reiciendis dolorem. Rerum aliquam ex dolores consequatur. Error velit quis nam distinctio.</p>
<p>Et explicabo ducimus occaecati nobis ad commodi omnis. Minus at dolorem velit odit deserunt et.</p>
<p>Voluptates corporis reprehenderit corporis voluptates molestias consequuntur officiis. Sunt corrupti sit consequuntur necessitatibus aut alias sed. Nihil sunt aut consequatur quas voluptatem nostrum ut quod. Quis sit sit mollitia nihil quam.</p>
<p>Quos dicta voluptatem non corrupti hic. Est et a dignissimos ratione laborum adipisci non. Fugiat ad excepturi voluptas officia.</p>', 770.86, 155, '2015-09-02', 10),
('Voluptatem minima consequatur sunt sint repellendus ut', '<p>Commodi ut fugiat illo quis deserunt asperiores porro molestias. Eos autem delectus quibusdam qui est. Voluptatum incidunt eius quam saepe nesciunt est dignissimos saepe.</p>
<p>Saepe et et ex quidem dignissimos pariatur. Voluptatem perspiciatis qui eos explicabo animi illo. Vero ut porro placeat cumque. Vitae ullam natus aliquam pariatur quis aut.</p>
<p>Doloremque qui consectetur asperiores et. Natus distinctio laboriosam et facere consequuntur eaque. Rem vel quidem quaerat velit. Qui sit aut voluptatum et omnis ullam.</p>
<p>Quis tempora possimus alias recusandae. Earum at eius eveniet dolor est. Possimus eligendi non enim asperiores. Nulla voluptas deserunt ex.</p>
<p>In commodi fugiat sint aspernatur sunt est vel. Et soluta rerum sit commodi dignissimos sint. Suscipit sequi placeat cumque aut consequatur. Aut iusto cum voluptatem sed dolores rem sed.</p>', 356.83, 40, '2017-02-07', 3),
('Quibusdam ipsa harum in et fugiat consectetur enim quasi sit', '<p>Officia sint harum eos dolores. Tempore ut laboriosam ut aliquid quod ea voluptatem repellat. Tempora et est rerum quidem aut adipisci. Saepe quis deleniti omnis asperiores provident quo.</p>
<p>Consectetur molestiae quos quo quis dolores et. Sunt omnis alias nemo dignissimos sint. Qui dignissimos ipsum non suscipit. Officiis est quas explicabo omnis tempora consectetur.</p>
<p>Et dignissimos explicabo dolores voluptas rerum sunt in dolores. Possimus alias sequi et numquam dicta rerum. Nostrum fuga omnis aperiam incidunt laboriosam. Totam ad eum velit consequatur aspernatur omnis.</p>', 270.26, 14, '2018-03-31', 5),
('Ut deserunt incidunt voluptatem officiis ut magnam', '<p>Quasi magnam blanditiis dignissimos harum sint. Qui praesentium rerum id facilis enim exercitationem rerum. Quo dolorem reprehenderit rerum placeat. Quo ipsa possimus sed sunt.</p>
<p>Aut deleniti fugiat dolorem ratione nobis perspiciatis. Ipsam et id corrupti. Esse ipsam ut consequatur laboriosam suscipit magni eos voluptatem.</p>
<p>Non inventore illo quidem hic doloribus quia. At aut aut voluptas deserunt atque quis quae. Ex qui expedita tempore odit adipisci et aut.</p>
<p>Ex vero recusandae soluta maiores nobis. Et eum inventore recusandae numquam amet ut. Quis tempore et quae quaerat illo quidem.</p>', 833.36, 85, '2016-05-20', 6),
('Ipsum mollitia consectetur ea temporibus enim cumque ea voluptatem sint', '<p>Quod rerum neque rerum cumque magni. Nulla minus necessitatibus reiciendis molestiae suscipit inventore.</p>
<p>Aut maxime et eligendi ratione quia sit sunt. Asperiores labore minus saepe recusandae est maiores. Explicabo quos voluptas distinctio. Nostrum dolores facilis fugiat distinctio vitae molestiae.</p>
<p>Praesentium non cupiditate quidem eos. Architecto odit ut similique mollitia doloremque eius id. Praesentium mollitia quia ad cum laborum sit eligendi. Sit molestiae quis et unde pariatur suscipit.</p>
<p>Temporibus error et est officiis. Architecto quos quia est voluptas. Ipsum et et aliquid enim culpa. Natus alias officia dolore vero vitae quidem dolorem.</p>
<p>Aut eos ea atque dignissimos eveniet aut harum tempore. Est modi qui nesciunt quas. Mollitia ut veritatis enim ut est. Tenetur laboriosam sit maiores officiis.</p>
<p>Sed sed sit provident aliquam. Fugit deserunt cumque dicta aut aliquid sunt. Enim libero iusto reiciendis consectetur nam cum voluptas. Aperiam sint nisi vitae optio in suscipit aliquam similique.</p>', 644.57, 139, '2016-03-27', 8),
('Inventore dolores similique et aut ipsum sit nulla', '<p>Sit numquam officiis neque. Quia maiores odio qui et cupiditate provident. Rerum voluptatem ipsum inventore incidunt aperiam aut.</p>
<p>Est non cum enim praesentium. Non labore eos earum facere sint et exercitationem. Quis corrupti et voluptate. Nesciunt repellat a laboriosam et deleniti aut. Cupiditate quia doloremque voluptatem earum ratione quia quo.</p>
<p>Non dolor qui quia enim rerum. Fugit ratione qui doloribus aspernatur expedita. Autem explicabo numquam aut minima vel consequatur odit. Amet pariatur dolore est animi.</p>
<p>Fugit vero nisi mollitia est quisquam quisquam. Ut nesciunt non eos omnis dolor. Molestiae ipsam ex voluptatem placeat et adipisci magnam.</p>
<p>Debitis ipsam laboriosam explicabo. Labore deserunt aliquid consequatur quia. Sapiente quia rerum suscipit consequuntur et atque. Esse repudiandae earum earum possimus.</p>
<p>Qui aliquid corrupti vitae cumque explicabo sed. Reprehenderit laudantium cum earum vel. Et minus non nesciunt ullam vel aperiam sunt. Deleniti minima officiis assumenda mollitia ut quo.</p>', 794.64, 149, '2017-11-04', 3),
('Rerum fugit dolor magni assumenda quam minus', '<p>Impedit rerum dolor ea quas ipsam qui. Quis quos eveniet facere incidunt. Molestiae aut architecto aliquam quae nihil molestiae autem consequatur.</p>
<p>Eos dolore natus molestiae nemo consequatur ducimus enim. Temporibus error possimus ab maiores aut. Numquam itaque molestiae modi inventore.</p>
<p>Itaque est iste rem necessitatibus fugiat. Sapiente earum et vel quo numquam qui. Voluptatibus in consectetur sunt minima eos cum dignissimos cumque. Nulla et dolorum qui eos cumque.</p>', 719.18, 109, '2015-04-17', 4),
('Doloremque et tenetur iure iusto aut sunt temporibus voluptas tenetur', '<p>Illo corporis ut est laborum. Id similique et et ut amet. Dolor occaecati natus incidunt labore repudiandae. Et cum qui impedit ut. Vero quis possimus aut ea animi nesciunt.</p>
<p>Minus qui quidem saepe voluptatem. Quisquam cupiditate reprehenderit praesentium nihil. Rem odit et possimus voluptatem hic reprehenderit repudiandae. Qui dicta consequuntur nesciunt nisi.</p>
<p>Est eum cumque rem sit odit alias. Assumenda explicabo nesciunt pariatur fugiat labore nostrum non. Architecto temporibus amet aut aut nesciunt fuga quidem.</p>
<p>Eaque aut eius facilis dolores. Itaque magni natus nam explicabo optio fuga est facere.</p>
<p>Ea nobis quia qui qui consequatur enim sunt vero. Qui sit aut quo quis illum iure. Est aspernatur dolorem neque explicabo velit.</p>
<p>Vel illo quisquam rerum consequatur eligendi cumque iusto eligendi. Sed assumenda tempore omnis odio natus. Velit est dolores ea quia. Debitis libero quis quia distinctio.</p>', 13.89, 183, '2016-10-29', 4),
('Eos at et temporibus consectetur nemo ea repudiandae tempora consequatur', '<p>Neque facere nisi et esse consequuntur asperiores officia. Reprehenderit est eum praesentium quia nostrum omnis. Et praesentium dignissimos nisi rerum vel. Velit rem non magni.</p>
<p>Accusantium quo voluptatem qui quo possimus. Porro nesciunt debitis ea numquam. Esse provident cumque inventore nulla. Veritatis placeat nisi rerum dignissimos doloribus praesentium consequatur. Quis ipsa alias aut repudiandae sequi blanditiis.</p>
<p>Ut eius facere qui vero sit. Voluptatum aut vel nihil soluta vel nostrum. Cumque odit pariatur pariatur non ea consequatur. Commodi autem error architecto voluptatibus eum.</p>', 999.9, 162, '2019-08-23', 6),
('Animi fugiat necessitatibus delectus aut autem repudiandae blanditiis soluta', '<p>Aut nihil rerum rem accusantium culpa. Quasi numquam harum quisquam sunt. Consequuntur mollitia enim voluptatem omnis. Unde quia minus eos modi.</p>
<p>Sapiente magnam nisi inventore eos qui. Consectetur nobis rerum totam et qui. Sit ut ut vero accusantium laboriosam quia. Sunt omnis et consequatur et eligendi.</p>
<p>Quo sint porro reprehenderit dolores cupiditate voluptatum. Earum sequi sunt recusandae omnis veritatis dolore. Eius voluptas at sunt est quae dolorum. Dolores quos laudantium quis maiores eius ut non.</p>', 206.52, 178, '2016-05-07', 9),
('Corporis voluptas consequatur laborum similique perspiciatis autem', '<p>Accusamus eaque architecto error cumque illum harum non. Facere suscipit consequatur deleniti dolorem sunt id. Eum deleniti molestias saepe pariatur.</p>
<p>Dolore aperiam animi sit non deserunt. Fuga tempora esse commodi voluptatem. Numquam dicta rem necessitatibus quis.</p>
<p>Dolorem natus dolorum quia ad. Accusantium sequi dolorem maiores ipsa voluptas ut. In quidem culpa cumque et. Atque et rerum omnis nisi nihil explicabo pariatur.</p>
<p>Sequi ea praesentium earum. Sit maiores animi culpa vitae maiores quis necessitatibus. Quia ut est ratione ut non voluptatem quasi. Sit aut ipsum est ratione.</p>
<p>Dolores sit quia sunt dolores. Consequuntur non nihil qui ipsum perspiciatis quia. Doloremque eveniet voluptate qui qui fuga doloribus soluta nostrum.</p>
<p>Maiores quis mollitia neque eaque qui voluptatum. Rerum in enim corrupti et provident modi. Itaque porro non illo dolore maiores expedita vel.</p>', 65.18, 73, '2019-10-29', 6);

INSERT INTO product_category(product_id, category_id) VALUES 
(1, 1),
(2, 4),
(3, 1),
(3, 3),
(4, 2),
(4, 3),
(5, 3),
(6, 1),
(7, 4),
(8, 3),
(9, 2),
(10, 2),
(11, 4),
(12, 4),
(13, 2),
(13, 3),
(14, 4),
(15, 4),
(16, 4),
(17, 1),
(18, 1),
(18, 3),
(19, 4),
(20, 2),
(21, 1),
(21, 3),
(22, 2),
(23, 2),
(23, 4),
(24, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 2),
(27, 3),
(28, 1),
(28, 4),
(29, 1),
(29, 4),
(30, 2);
