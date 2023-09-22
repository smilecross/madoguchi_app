-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: mysql
-- 生成日時: 2023 年 9 月 22 日 15:42
-- サーバのバージョン： 8.0.32
-- PHP のバージョン: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `madoguchi`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `chats`
--

CREATE TABLE `chats` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `family_page_id` bigint UNSIGNED DEFAULT NULL,
  `procedure_page_id` bigint UNSIGNED DEFAULT NULL,
  `chat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `chats`
--

INSERT INTO `chats` (`id`, `user_id`, `family_page_id`, `procedure_page_id`, `chat`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 2, NULL, NULL, 'god', '良い感じ', '2023-09-08 11:00:08', '2023-09-08 11:00:08', NULL),
(3, 1, NULL, NULL, 'today', 'Birthday', '2023-09-08 11:00:37', '2023-09-08 11:00:37', NULL),
(4, 1, NULL, NULL, 'ラグビー', '9/10', '2023-09-08 12:17:30', '2023-09-08 12:22:43', NULL),
(5, 2, NULL, NULL, 'test', 'むずいなぁ', '2023-09-09 02:46:24', '2023-09-09 02:46:24', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `conditions`
--

CREATE TABLE `conditions` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `deceaseds`
--

CREATE TABLE `deceaseds` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `diagnosis_results`
--

CREATE TABLE `diagnosis_results` (
  `id` int NOT NULL,
  `family_page_id` int NOT NULL,
  `profile_info_id` int NOT NULL,
  `job_admin_info_id` int NOT NULL,
  `estate_info_id` int NOT NULL,
  `financial_info_id` int NOT NULL,
  `other_info_id` int NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `estate_infos`
--

CREATE TABLE `estate_infos` (
  `id` int NOT NULL,
  `family_page_id` int NOT NULL,
  `residence` enum('持ち家','賃貸','社宅・寮','その他','わからない') NOT NULL,
  `property_type` enum('戸建て','集合住宅（アパート・マンションなど）','わからない','') NOT NULL,
  `property_ownership` enum('本人','本人以外','共同名義','わからない') NOT NULL,
  `rented_land` enum('ある','ない','わからない','') NOT NULL,
  `leased_property` enum('ある','ない','わからない','') NOT NULL,
  `owned_land` enum('ある','ない','わからない','') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `family_pages`
--

CREATE TABLE `family_pages` (
  `id` bigint UNSIGNED NOT NULL,
  `inheritor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deceased_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `family_pages`
--

INSERT INTO `family_pages` (`id`, `inheritor_name`, `deceased_date`, `created_at`, `updated_at`) VALUES
(1, 'テスト', '2023-09-15', '2023-09-15 12:19:41', '2023-09-15 12:19:41'),
(2, 'テスト', '2023-09-15', '2023-09-15 12:20:18', '2023-09-15 12:20:18'),
(3, 'テスト', '2023-09-16', '2023-09-16 02:27:09', '2023-09-16 02:27:09'),
(4, 'テスト', '2023-09-16', '2023-09-16 03:15:55', '2023-09-16 03:15:55'),
(5, 'テスト', '2023-09-16', '2023-09-16 04:36:31', '2023-09-16 04:36:31'),
(6, 'テスト', '2023-09-16', '2023-09-16 04:43:39', '2023-09-16 04:43:39'),
(7, 'テスト', '2023-09-16', '2023-09-16 04:53:23', '2023-09-16 04:53:23'),
(8, 'テスト2', '2023-09-16', '2023-09-16 12:32:46', '2023-09-16 12:32:46'),
(9, 'テスト2', '2023-09-16', '2023-09-16 12:33:07', '2023-09-16 12:33:07'),
(10, 'テスト2', '2023-09-17', '2023-09-17 03:00:57', '2023-09-17 03:00:57'),
(11, 'テスト3', '2023-09-20', '2023-09-19 15:03:39', '2023-09-19 15:03:39'),
(12, 'テスト3', '2023-09-21', '2023-09-21 05:32:28', '2023-09-21 05:32:28'),
(13, 'テスト3', '2023-09-22', '2023-09-21 15:20:40', '2023-09-21 15:20:40');

-- --------------------------------------------------------

--
-- テーブルの構造 `financial_infos`
--

CREATE TABLE `financial_infos` (
  `id` int NOT NULL,
  `family_page_id` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `financial_info_options`
--

CREATE TABLE `financial_info_options` (
  `id` int NOT NULL,
  `family_page_id` bigint UNSIGNED NOT NULL,
  `financial_info_id` int NOT NULL,
  `financial_option_id` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `financial_options`
--

CREATE TABLE `financial_options` (
  `id` int NOT NULL,
  `option_name` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- テーブルのデータのダンプ `financial_options`
--

INSERT INTO `financial_options` (`id`, `option_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '現金・預貯金（外貨預金含む）', NULL, NULL, NULL),
(2, '有価証券（上場株式・債券・投資信託など）', NULL, NULL, NULL),
(3, '非上場株式', NULL, NULL, NULL),
(4, '生命保険', NULL, NULL, NULL),
(5, '損害保険（火災・家財等）', NULL, NULL, NULL),
(6, '暗号資産（BTC・NFT等）', NULL, NULL, NULL),
(7, '金', NULL, NULL, NULL),
(8, 'ゴルフ会員権・預託金', NULL, NULL, NULL),
(9, 'その他の金融資産', NULL, NULL, NULL),
(10, '貸付金', NULL, NULL, NULL),
(11, '住宅ローン', NULL, NULL, NULL),
(12, '自動車ローン', NULL, NULL, NULL),
(13, '教育ローン', NULL, NULL, NULL),
(14, 'その他の借入れ', NULL, NULL, NULL),
(15, '連帯保証人', NULL, NULL, NULL),
(16, 'クレジットカード', NULL, NULL, NULL),
(17, 'ICカード', NULL, NULL, NULL),
(18, 'プリペイドカード', NULL, NULL, NULL),
(19, 'コード決済', NULL, NULL, NULL),
(20, 'iDeCo', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `invitations`
--

CREATE TABLE `invitations` (
  `id` bigint UNSIGNED NOT NULL,
  `procedure_page_id` bigint UNSIGNED NOT NULL,
  `inviter_id` bigint UNSIGNED NOT NULL,
  `invitee_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('unread','read','joined','expired') COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `job_admin_infos`
--

CREATE TABLE `job_admin_infos` (
  `id` int NOT NULL,
  `family_page_id` int NOT NULL,
  `occupation_id` varchar(255) NOT NULL,
  `multiple_incomes` enum('はい','いいえ','わからない','') NOT NULL,
  `pension_reception` enum('はい','いいえ','わからない','') NOT NULL,
  `care_certification` enum('はい','いいえ','わからない','') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_07_132124_create_chats_table', 2),
(6, '2023_09_08_123017_add_user_id_to_chats_table', 3),
(9, '2023_09_10_030726_create_deceaseds_table', 4),
(12, '2023_09_10_060248_add_procedure_page_id_to_chats_table', 6),
(13, '2023_09_10_055025_create_invitations_table', 7),
(16, '2023_09_10_060248_add_family_page_id_to_chats_table', 8),
(17, '2023_09_13_070605_create_diagnosis_table', 8),
(18, '2023_09_15_112914_create_family_pages_table', 8),
(24, '2023_09_18_083045_rename_profile_info_to_profile_infos', 9),
(25, '2023_09_18_083148_rename_job_admin_info_to_job_admin_infos', 9),
(26, '2023_09_18_083241_rename_estate_info_to_estate_infos', 9),
(27, '2023_09_18_083322_rename_financial_info_to_financial_infos', 9),
(28, '2023_09_18_083407_rename_other_info_to_other_infos', 9),
(29, '2023_09_21_055657_add_deleted_at_to_chats_table', 10),
(30, '2023_09_21_062232_add_deleted_at_to_users_table', 11),
(31, '2023_09_21_063223_add_deleted_at_to_estate_infos_table', 12),
(32, '2023_09_21_064122_add_deleted_at_to_profile_infos_table', 13),
(33, '2023_09_21_070721_add_deleted_at_to_diagnosis_results_table', 14),
(34, '2023_09_21_074320_add_family_id_and_deleted_at_to_financial_info_options_table', 15),
(35, '2023_09_21_075800_add_timestamps_and_softdeletes_to_financial_options_table', 16),
(39, '2023_09_21_082849_rename_family_id_to_family_page_id_in_financial_info_options', 17),
(40, '2023_09_21_115316_create_occupations_table', 17),
(41, '2023_09_21_115434_modify_occupation_column_in_job_admin_infos_table', 18),
(42, '2023_09_21_132734_add_deleted_at_to_other_infos_table', 19),
(44, '2023_09_21_133627_create_will_statuses_table', 20),
(45, '2023_09_21_133800_modify_other_infos_table_for_will_status_relation', 21),
(46, '2023_09_21_134440_modify_other_infos_table_for_will_status_relation', 21),
(47, '2023_09_22_103006_create_tasks_table', 22),
(48, '2023_09_22_115722_create_conditions_table', 23),
(49, '2023_09_22_115738_create_task_conditions_table', 23);

-- --------------------------------------------------------

--
-- テーブルの構造 `occupations`
--

CREATE TABLE `occupations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `occupations`
--

INSERT INTO `occupations` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '会社員・会社役員', NULL, NULL, NULL),
(2, '会社経営', NULL, NULL, NULL),
(3, '派遣社員', NULL, NULL, NULL),
(4, 'パート・アルバイト（保険あり）', NULL, NULL, NULL),
(5, 'パート・アルバイト（保険なし）', NULL, NULL, NULL),
(6, '個人事業・フリーランス', NULL, NULL, NULL),
(7, '主夫・主婦', NULL, NULL, NULL),
(8, 'その他', NULL, NULL, NULL),
(9, 'わからない', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `other_infos`
--

CREATE TABLE `other_infos` (
  `id` int NOT NULL,
  `family_page_id` int NOT NULL,
  `vehicle` enum('普通車','軽自動車','バイク','原付自転車','なし','わからない') NOT NULL,
  `has_pet` enum('犬','猫','許可が必要な動物','その他','ペットはいない') NOT NULL,
  `number_of_heirs` enum('1人','2〜3人','4人以上','わからない') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `will_status_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `profile_infos`
--

CREATE TABLE `profile_infos` (
  `id` int NOT NULL,
  `family_page_id` int NOT NULL,
  `birthdate` date NOT NULL,
  `prefecture` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address_detail` text NOT NULL,
  `is_household_head` enum('はい','いいえ','わからない') NOT NULL,
  `spouse_status` enum('はい','いいえ','死別','離婚','わからない') NOT NULL,
  `has_dependent_children` enum('はい','いいえ','わからない','') NOT NULL,
  `lived_with_others` enum('はい','いいえ','わからない','') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `task_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline_days` int DEFAULT NULL,
  `deadline_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `procedure_location` enum('市区町村役場など','勤務先','金融機関','オンライン','その他') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `tasks`
--

INSERT INTO `tasks` (`id`, `task_name`, `deadline_days`, `deadline_text`, `procedure_location`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '保険証等の返還', 14, NULL, '市区町村役場など', NULL, NULL, NULL),
(2, '保険証送付先変更', 14, NULL, '市区町村役場など', NULL, NULL, NULL),
(3, '保険証世帯主変更', 14, NULL, '市区町村役場など', NULL, NULL, NULL),
(4, '葬祭費の支給申請', NULL, 'おおよそ2年以内', '市区町村役場など', NULL, NULL, NULL),
(5, '高額療養費の払い戻し', NULL, 'おおよそ2年以内', '市区町村役場など', NULL, NULL, NULL),
(6, '高齢者乗車券等の返還', NULL, '速やかに', '市区町村役場など', NULL, NULL, NULL),
(7, '介護保険被保険者証などの返還、送付先変更', NULL, '速やかに', '市区町村役場など', NULL, NULL, NULL),
(8, '高額介護サービス費の未支給分の請求', NULL, 'おおよそ2年以内', '市区町村役場など', NULL, NULL, NULL),
(9, '身体障害者手帳・乗車券の返還', NULL, '速やかに', '市区町村役場など', NULL, NULL, NULL),
(10, '身体障害者手帳・乗車券など各種手当の喪失届', NULL, '速やかに', '市区町村役場など', NULL, NULL, NULL),
(11, '精神障害者保健福祉手帳等の返還', NULL, '速やかに', '市区町村役場など', NULL, NULL, NULL),
(12, '小児慢性特定疾病医療受給者証の返還', NULL, '速やかに', '市区町村役場など', NULL, NULL, NULL),
(13, '特定医療費（指定難病）受給者証の返還', NULL, '速やかに', '市区町村役場など', NULL, NULL, NULL),
(14, '肝炎治療受給者証の返還', NULL, '速やかに', '市区町村役場など', NULL, NULL, NULL),
(15, '被爆者健康手帳の返還', NULL, '速やかに', '市区町村役場など', NULL, NULL, NULL),
(16, '被爆者各種手当の受取人変更手続き', NULL, '速やかに', '市区町村役場など', NULL, NULL, NULL),
(17, '児童手当等の変更手続き', NULL, '速やかに', '市区町村役場など', NULL, NULL, NULL),
(18, '児童扶養手当等の認定請求', NULL, '速やかに', '市区町村役場など', NULL, NULL, NULL),
(19, '認定保育園に関する手続き', NULL, '速やかに', '市区町村役場など', NULL, NULL, NULL),
(20, 'ひとり親家庭など医療証の申請', NULL, '速やかに', '市区町村役場など', NULL, NULL, NULL),
(21, '出産・子育て応援事業による出生後の給付金の申請', NULL, '随時', '市区町村役場など', NULL, NULL, NULL),
(22, '市県民税納税通知書送付先の変更', 14, '', '市区町村役場など', NULL, NULL, NULL),
(23, '固定資産税納税義務者の届出', NULL, '随時', '市区町村役場など', NULL, NULL, NULL),
(24, '市税の納付及び納付相談', NULL, '随時', '市区町村役場など', NULL, NULL, NULL),
(25, '戸籍謄本の取り寄せ', 30, NULL, '市区町村役場など', NULL, NULL, NULL),
(26, '相続人を調査（法定相続情報一覧図作成）', 30, NULL, 'その他', NULL, NULL, NULL),
(27, '所得税の準確定申告', 120, NULL, '市区町村役場など', NULL, NULL, NULL),
(28, '住民票の徐票・相続人の印鑑証明書取得', 300, NULL, '市区町村役場など', NULL, NULL, NULL),
(29, '国民年金受給停止', 14, NULL, 'その他', NULL, NULL, NULL),
(30, '厚生年金受給停止', 10, NULL, 'その他', NULL, NULL, NULL),
(31, 'お墓の名義変更（承継）', 300, NULL, '市区町村役場など', NULL, NULL, NULL),
(32, 'クレジットカードの解約（携帯料金用以外のカード）', NULL, 'すぐ', 'その他', NULL, NULL, NULL),
(33, '会費・定期購読・積立金の解約', NULL, 'すぐ', 'その他', NULL, NULL, NULL),
(34, '互助会の解約・払い戻し手続き', NULL, 'すぐ', 'その他', NULL, NULL, NULL),
(35, '旅行積立金の解約・払い戻し手続き', NULL, 'すぐ', 'その他', NULL, NULL, NULL),
(36, '遺族年金受給手続き', NULL, '速やかに', 'その他', NULL, NULL, NULL),
(37, '遺族厚生年金受給手続き', NULL, '速やかに', 'その他', NULL, NULL, NULL),
(38, '電気・ガス・水道の契約変更・解約', 30, NULL, 'その他', NULL, NULL, NULL),
(39, '電話（固定・携帯）の契約変更・解約', 30, NULL, 'その他', NULL, NULL, NULL),
(40, 'NHKの契約変更・解約', 30, NULL, 'その他', NULL, NULL, NULL),
(41, '遺言書の確認', NULL, '速やかに', 'その他', NULL, NULL, NULL),
(42, 'ポイント・マイルの相続手続き', 180, NULL, 'オンライン', NULL, NULL, NULL),
(43, '遺品整理', NULL, '落ち着いてから', 'その他', NULL, NULL, NULL),
(44, '免許証の返納', NULL, '落ち着いてから', 'その他', NULL, NULL, NULL),
(45, 'パスポートの返納', NULL, '落ち着いてから', 'その他', NULL, NULL, NULL),
(46, 'SNSアカウントの削除・追悼アカウントへ移行', NULL, '速やかに', 'オンライン', NULL, NULL, NULL),
(47, 'SNS収益アカウントの継続・解約', NULL, '速やかに', 'オンライン', NULL, NULL, NULL),
(48, '電子メール、Webサイト（ブログ）のアカウント削除', NULL, '速やかに', 'オンライン', NULL, NULL, NULL),
(49, '家族の国民健康保険加入', NULL, '速やかに', '市区町村役場など', NULL, NULL, NULL),
(50, '不動産の相続登記', NULL, '遺産分割協議等終了後', 'その他', NULL, NULL, NULL),
(51, '転居', NULL, '速やかに', 'その他', NULL, NULL, NULL),
(52, '賃貸契約の名義変更', NULL, '速やかに', 'その他', NULL, NULL, NULL),
(53, '預貯金口座の金融機関へ死亡届', NULL, '速やかに', '金融機関', NULL, NULL, NULL),
(54, '証券会社で名義変更など', NULL, '遺産分割協議後', '金融機関', NULL, NULL, NULL),
(55, '株式発行会社に報告', NULL, '遺産分割協議後', 'その他', NULL, NULL, NULL),
(56, '保険金請求', NULL, '落ち着いたら', '金融機関', NULL, NULL, NULL),
(57, '暗号資産取引所へ報告', NULL, '落ち着いたら', '金融機関', NULL, NULL, NULL),
(58, '名義変更、売却', NULL, '落ち着いたら', 'その他', NULL, NULL, NULL),
(59, '弁護士へ相談', NULL, '速やかに', 'その他', NULL, NULL, NULL),
(60, '名義変更、売却', NULL, '落ち着いたら', 'その他', NULL, NULL, NULL),
(61, '名義変更', NULL, '速やかに', '市区町村役場など', NULL, NULL, NULL),
(62, '相続放棄', 90, NULL, 'その他', NULL, NULL, NULL),
(63, '相続税の申告と納税', 300, NULL, 'その他', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `task_conditions`
--

CREATE TABLE `task_conditions` (
  `id` bigint UNSIGNED NOT NULL,
  `task_id` bigint UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'smile', 'smilecross@gmail.com', NULL, '$2y$10$g9gujfYKqEwmh4Xtl9HJtuFYoXqeL95F3Xvs6jVAruRuFJyxBUz3W', NULL, '2023-09-01 16:23:03', '2023-09-01 16:23:03', NULL),
(2, 'cross', 'crossheart44@gmail.com', NULL, '$2y$10$j4cDD3Un6L9KrY9ivfR7TOo0pqxAL0Sr.I.0G44/NMD85PrcMS5t6', NULL, '2023-09-08 12:58:14', '2023-09-08 12:58:14', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `will_statuses`
--

CREATE TABLE `will_statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `status_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `will_statuses`
--

INSERT INTO `will_statuses` (`id`, `status_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '公正証書遺言あり', NULL, NULL, NULL),
(2, '自筆証書遺言あり', NULL, NULL, NULL),
(3, '遺言なし', NULL, NULL, NULL),
(4, 'エンディングノート', NULL, NULL, NULL),
(5, 'わからない', NULL, NULL, NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_user_id_foreign` (`user_id`),
  ADD KEY `chats_procedure_page_id_foreign` (`procedure_page_id`);

--
-- テーブルのインデックス `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `deceaseds`
--
ALTER TABLE `deceaseds`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `diagnosis_results`
--
ALTER TABLE `diagnosis_results`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `estate_infos`
--
ALTER TABLE `estate_infos`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `family_pages`
--
ALTER TABLE `family_pages`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `financial_infos`
--
ALTER TABLE `financial_infos`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `financial_info_options`
--
ALTER TABLE `financial_info_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `financial_info_options_family_id_foreign` (`family_page_id`);

--
-- テーブルのインデックス `financial_options`
--
ALTER TABLE `financial_options`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invitations_token_unique` (`token`),
  ADD KEY `invitations_procedure_page_id_foreign` (`procedure_page_id`),
  ADD KEY `invitations_inviter_id_foreign` (`inviter_id`);

--
-- テーブルのインデックス `job_admin_infos`
--
ALTER TABLE `job_admin_infos`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `occupations`
--
ALTER TABLE `occupations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `other_infos`
--
ALTER TABLE `other_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `other_infos_will_status_id_foreign` (`will_status_id`);

--
-- テーブルのインデックス `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- テーブルのインデックス `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- テーブルのインデックス `profile_infos`
--
ALTER TABLE `profile_infos`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `task_conditions`
--
ALTER TABLE `task_conditions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_conditions_task_id_foreign` (`task_id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- テーブルのインデックス `will_statuses`
--
ALTER TABLE `will_statuses`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- テーブルの AUTO_INCREMENT `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `deceaseds`
--
ALTER TABLE `deceaseds`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `diagnosis_results`
--
ALTER TABLE `diagnosis_results`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `estate_infos`
--
ALTER TABLE `estate_infos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `family_pages`
--
ALTER TABLE `family_pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- テーブルの AUTO_INCREMENT `financial_infos`
--
ALTER TABLE `financial_infos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `financial_info_options`
--
ALTER TABLE `financial_info_options`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `financial_options`
--
ALTER TABLE `financial_options`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- テーブルの AUTO_INCREMENT `invitations`
--
ALTER TABLE `invitations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `job_admin_infos`
--
ALTER TABLE `job_admin_infos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- テーブルの AUTO_INCREMENT `occupations`
--
ALTER TABLE `occupations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- テーブルの AUTO_INCREMENT `other_infos`
--
ALTER TABLE `other_infos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `profile_infos`
--
ALTER TABLE `profile_infos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- テーブルの AUTO_INCREMENT `task_conditions`
--
ALTER TABLE `task_conditions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルの AUTO_INCREMENT `will_statuses`
--
ALTER TABLE `will_statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_procedure_page_id_foreign` FOREIGN KEY (`procedure_page_id`) REFERENCES `procedure_pages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- テーブルの制約 `financial_info_options`
--
ALTER TABLE `financial_info_options`
  ADD CONSTRAINT `financial_info_options_family_id_foreign` FOREIGN KEY (`family_page_id`) REFERENCES `family_pages` (`id`);

--
-- テーブルの制約 `invitations`
--
ALTER TABLE `invitations`
  ADD CONSTRAINT `invitations_inviter_id_foreign` FOREIGN KEY (`inviter_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invitations_procedure_page_id_foreign` FOREIGN KEY (`procedure_page_id`) REFERENCES `procedure_pages` (`id`) ON DELETE CASCADE;

--
-- テーブルの制約 `other_infos`
--
ALTER TABLE `other_infos`
  ADD CONSTRAINT `other_infos_will_status_id_foreign` FOREIGN KEY (`will_status_id`) REFERENCES `will_statuses` (`id`);

--
-- テーブルの制約 `task_conditions`
--
ALTER TABLE `task_conditions`
  ADD CONSTRAINT `task_conditions_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
