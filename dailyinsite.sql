-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 19-08-25 15:59
-- 서버 버전: 5.7.27
-- PHP 버전: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `dailyinsite`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `Pka_Admin`
--

CREATE TABLE `Pka_Admin` (
  `PAD_idx` int(11) NOT NULL,
  `admin_token_val` varchar(255) NOT NULL,
  `PAD_id` varchar(20) NOT NULL,
  `PAD_passwd` varchar(255) NOT NULL,
  `PAD_name` varchar(20) NOT NULL,
  `PAD_phone` varchar(14) NOT NULL,
  `PAD_status` int(1) NOT NULL,
  `PAD_joindate` datetime NOT NULL,
  `PAD_logindate` datetime NOT NULL,
  `PAD_logoutdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `Pka_Admin`
--

INSERT INTO `Pka_Admin` (`PAD_idx`, `admin_token_val`, `PAD_id`, `PAD_passwd`, `PAD_name`, `PAD_phone`, `PAD_status`, `PAD_joindate`, `PAD_logindate`, `PAD_logoutdate`) VALUES
(1, 'rCZw00GCJIwK9eWdOmpsPB9bmUqYulsUItVv71Bi', 'admin', '*E431EED36D281476EB76638056D59E957F4B2F1C', '관리자', '', 1, '0000-00-00 00:00:00', '2019-07-05 20:56:11', '2019-06-14 14:16:01');

-- --------------------------------------------------------

--
-- 테이블 구조 `Pka_Bookmark`
--

CREATE TABLE `Pka_Bookmark` (
  `PB_idx` int(11) NOT NULL,
  `PU_idx` int(11) NOT NULL,
  `token_val` varchar(255) NOT NULL COMMENT '기준값',
  `PU_userid` varchar(20) DEFAULT NULL,
  `PU_passwd` varchar(255) DEFAULT NULL,
  `PU_email` varchar(255) DEFAULT NULL,
  `PU_name` varchar(12) DEFAULT NULL,
  `PU_phone` varchar(13) DEFAULT NULL,
  `PU_url` varchar(255) DEFAULT NULL,
  `PU_subject` varchar(255) DEFAULT NULL,
  `PU_contents` text,
  `PU_category` varchar(255) DEFAULT NULL,
  `PU_open_ck` varchar(30) DEFAULT NULL,
  `PU_open_email` text,
  `PU_likeuser` text,
  `PU_hit` int(11) NOT NULL DEFAULT '0',
  `PU_fileName` text,
  `PU_files` text,
  `PU_ogimage` varchar(255) DEFAULT NULL,
  `PU_files_comment` text,
  `PU_joindate` datetime DEFAULT NULL,
  `PU_modifydate` datetime DEFAULT NULL,
  `PU_memo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `Pka_Bookmark`
--

INSERT INTO `Pka_Bookmark` (`PB_idx`, `PU_idx`, `token_val`, `PU_userid`, `PU_passwd`, `PU_email`, `PU_name`, `PU_phone`, `PU_url`, `PU_subject`, `PU_contents`, `PU_category`, `PU_open_ck`, `PU_open_email`, `PU_likeuser`, `PU_hit`, `PU_fileName`, `PU_files`, `PU_ogimage`, `PU_files_comment`, `PU_joindate`, `PU_modifydate`, `PU_memo`) VALUES
(2, 5, 'AV9BsLm2ZweWA1zmdFNiVILe4WvHrNDuNhv3WepZ', NULL, NULL, 'hichoims@naver.com', NULL, NULL, '', '', '11111111', '', NULL, NULL, NULL, 0, NULL, '/////////', NULL, NULL, '2019-05-20 17:00:52', '2019-05-23 02:12:57', ''),
(4, 8, 'OySwyk6wFdYlaeZZFVvzhD1eaGQVJpIo0e09Hus7', NULL, NULL, 'huchiy@gmail.com', NULL, NULL, 'test', 'test', 'test', '1', NULL, NULL, NULL, 0, NULL, '/IMG_1558472321451.jpg////////', NULL, NULL, '2019-05-22 05:58:44', NULL, ''),
(5, 9, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'https://www.cbinsights.com/research/bezos-amazon-shareholder-letters/', '제프 베조스의 연간 주주 서한 모음', '아마존 창업자 제프 베조스는 매년 주주들을 대상으로 편지를 보냅니다. 아마존의 기업 철학과 신제품을 설명하고, 해당 연도의 경영 방향을 제공하기 위함입니다. 작은 온라인 서점에서 시작한 첫 해부터, 공룡 기업이 된 최근의 주주 서한까지 한 번에 모아놓은 cbinsights의 글이 있어 가져왔습니다.', '19', NULL, NULL, NULL, 0, '', '/IMG_1561734910783.jpg////////', '', NULL, '2019-05-22 13:12:15', '2019-06-29 00:15:17', ''),
(6, 9, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'http://junglescout.co.kr/?p=652', '정글스카우트 - 아마존 PL 지니어스 시리즈', '역시 아마존 셀러에 대해서 검색하다가 찾게 된 사이트입니다. 정글스카우트는 미국 기업으로, 아마존 셀러들이 새롭게 출시할 제품을 결정할 수 있는 툴을 제공하는 소프트웨어 기업입니다. 검색어, 카테고리를 기반으로 다른 셀러들이 어느 정도의 이익을 내고 있는지도 볼 수 있고, 어떤 제품이 유망할지도 검색할 수 있습니다. (유료) 파워 셀러이신 이진희 실장님이 정글스카우트를 국내에 소개하는 역할을 맡으면서 해당 사이트 내에 게시한 칼럼 글로 보입니다. 처음 아마존 셀러를 시작한 외국 셀러의 이야기가 유익합니다.', '1', NULL, NULL, NULL, 0, NULL, '/////////', NULL, NULL, '2019-05-22 13:12:45', NULL, ''),
(7, 9, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'https://www.junglescout.com/estimator/', '해외 정글스카우트 웹사이트 - Free Amazon Sales Estimator', '정글스카우트의 소프트웨어입니다. 툴 전체를 사용하기 위해서는 돈을 지불해야하지만, 카테고리와 카테고리 내 제품 순위를 기반으로 한 달에 해당 셀러가 얼마나 제품을 판매하는지 예측할 수 있는 해당 링크는 무료로 사용 가능합니다.', '1', NULL, NULL, NULL, 0, NULL, '/////////', NULL, NULL, '2019-05-22 13:13:17', NULL, ''),
(8, 9, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'http://blog.naver.com/PostView.nhn?blogId=jonathan88&logNo=221149894995&parentCategoryNo=&categoryNo=25&viewDate=&isShowPopularPosts=false&from=postView', '파랑갈매기 님 블로그 글', '이 또한 웹 서핑 중 발견한 유익한 블로그입니다. 파워 셀러의 블로그인듯 보이고, 처음 셀러 계정을 만들면서 세부적인 문제에 막혔을 때 많은 도움이 됐습니다. 특히 도움이 된 글을 가져와 봤습니다.', '9', NULL, NULL, NULL, 0, NULL, '/////////', '', NULL, '2019-05-22 13:14:09', '2019-06-20 10:04:19', ''),
(9, 9, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'http://domeggook.com/main/index.php', '도매꾹', '이미 유명한 B2B도매 사이트입니다. 이미 아마존에서 팔리고 있는 제품들도 많고, 저렴한 가격에 좋은 제품들을 소싱할 수 있습니다. 또한, 알리바바로 소싱하기가 두려운 저와 같은 초보들에게 더욱 신뢰가 갑니다. 다만, 아마존에서 팔리고 있는지 여부를 확인할 수 있는 바코드 번호는 제공하지 않고 있습니다.', '1', NULL, NULL, NULL, 0, NULL, '/////////', NULL, NULL, '2019-05-22 13:14:32', NULL, ''),
(10, 9, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'https://www.sellerapp.com/', '제품 설명 추출을 돕는 소프트웨어 툴', '직접 제품을 올리며 가장 어려웠던 것이 제품 Description을 만들어 내는 것이었습니다. 다른 셀러들은 제품의 제목부터 많은 미사여구를 쓰고, 상세 설명 분야에서는 HTML코드를 써가며 예쁜 효과를 주기도 하더라구요. 설명을 그냥 텍스트로 쓰면, 해당 글을 HTML로 변환하여 바로 전자상거래 사이트에 업로드할 수 있게 도와주는 유용한 툴입니다.', '17', NULL, NULL, NULL, 0, NULL, '/////////', NULL, NULL, '2019-05-22 13:15:04', '2019-06-13 13:12:21', ''),
(16, 2, 'OySwyk6wFdYlaeZZFVvzhD1eaGQVJpIo0e09Hus7', NULL, NULL, 'huchiy@gmail.com', NULL, NULL, 'http://naver.com', 'test', 'test', '11', NULL, NULL, NULL, 0, NULL, '/IMG_1558546356211.jpg////////', '', NULL, '2019-05-23 02:32:46', '2019-06-24 04:49:50', ''),
(17, 11, 'OySwyk6wFdYlaeZZFVvzhD1eaGQVJpIo0e09Hus7', NULL, NULL, 'huchiy@gmail.com', NULL, NULL, 'naver.com', '네이버', '네이버 메인에서 다양한 정보와 유용한 컨텐츠를 만나 보세요', '15', NULL, NULL, NULL, 0, NULL, '/IMG_1560454801785.jpg////////', 'https://s.pstatic.net/static/www/mobile/edit/2016/0705/mobile_212852414260.png', NULL, '2019-05-27 02:49:01', '2019-06-14 11:25:45', ''),
(18, 13, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'https://news.joins.com/article/20399413', '\"변하지 않으면 죽는다\"…몰락한 야후가 당신에게 던지는 메시지', '웹 1.0 시대의 선두주자였던 야후의 몰락에 관련한 언론사 글 링크\r\n출처 : 중앙일보', '1', NULL, NULL, NULL, 0, NULL, '/IMG_1558931777456.jpg////////', NULL, NULL, '2019-05-27 13:34:27', '2019-05-27 13:36:28', ''),
(19, 14, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'https://cheombooks.net/category/2019%EB%85%84-%EC%B6%9C%EA%B0%84-%EB%8F%84%EC%84%9C/%ED%85%90%EC%84%BC%ED%8A%B8-%EB%9D%BC%EC%9D%B4%EC%A7%95/', '텐센트라이징', '이 책은 텐센트가 급부상한 과정을 창업부터 현재까지 꼼꼼하게 기록하고 인터넷의 시각에서 글로벌화 과정을 겪는 중국의 성공과 혁신을 바라본다.', '1', NULL, NULL, NULL, 0, NULL, '/IMG_1559003970811.jpg////////', NULL, NULL, '2019-05-28 09:39:57', NULL, ''),
(20, 16, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'https://brunch.co.kr/@businessinsight/6', '이미지 수집 SNS, 핀터레스트가 돈 버는 방법', '광고에 가장 적합한 SNS | 원체 창조가 불가능한 똥손인지라 디자인 작업을 위해선 늘 레퍼런스 사이트를 뒤져보곤 합니다. 핀터레스트도 꼭 찾아보는 사이트 중 하나인데요. 특히 제작년쯤부터 한국 디자이너들의 훌륭한 웹/앱디자인이 늘고있어 지금은 당당히 제 레퍼런스 사이트 중 1위를 차지하고 있습니다..!(안물안궁)   이 핀터레스트가 아직 한국에서는 “디자이너 포폴사이트”의 인식이 강하', '16', NULL, NULL, NULL, 0, NULL, '/IMG_1560416763128.jpg////////', 'https://t1.daumcdn.net/thumb/R1280x0/?fname=http://t1.daumcdn.net/brunch/service/user/5uIw/image/-I_uqtHbeGDA1QfXVBSwmWqCMlI.jpg', NULL, '2019-05-29 22:27:44', '2019-06-17 09:42:28', ''),
(21, 17, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'https://www.alibaba.com/product-detail/Custom-Aroma-Scent-Sachet-Bag-Air_60838323465.html?spm=a2700.galleryofferlist.normalList.109.77487c4aVTDFMm', '아로마 사쉐 주머니', '-', '1', NULL, NULL, NULL, 0, NULL, '/////////', NULL, NULL, '2019-05-30 15:20:43', NULL, ''),
(22, 18, 'MGlTZq7FA5R9krVN7PwhnRhR0p8WCn2hfOrUH0au', NULL, NULL, 'hi.choims@gmail.com', NULL, NULL, 'http://www.hbrkorea.com/magazine/article/view/1_1/page/1/article_no/1291?fbclid=IwAR1h9Cw1iaMr61ujQx7LmuffvLzYt-_iGYF9PFEuqAxAWgXK9z5ikFOzptU', '플랫폼네트워크', 'ㅁㄴㅇ', '1', NULL, NULL, NULL, 0, NULL, '/////////', NULL, NULL, '2019-06-01 19:53:24', NULL, ''),
(23, 3, 'OySwyk6wFdYlaeZZFVvzhD1eaGQVJpIo0e09Hus7', NULL, NULL, 'huchiy@gmail.com', NULL, NULL, '123123', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', '3', NULL, NULL, NULL, 0, NULL, '/IMG_1561711369251.jpg////////', '', NULL, '2019-06-10 04:22:14', '2019-06-30 23:59:19', ''),
(24, 16, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'https://brunch.co.kr/@gzerof/37', '창업하는 직장인 : 채터박스의 시작', '#1. 아직도 뭔가 하고 있었구나? | 계속되는 창업 도전기 직장 다니면서 창업을 준비해 가는 회사원의 이야기를 가감 없이 다루고 싶었다. 그런데 어느덧 마지막 연재 글이 이 1년 반도 전의 글에서 멈춰버리고 말았고 다시 한번 대단한 일 하는 것보다 꾸준히 하는 게 가장 힘들다는 것을 뼈저리게 느낀다.  나는 평범한 회사원이니까 내가 할 수 있는 선에서 내가 가지고 있는 자원을 소비해 무언가를', '16', NULL, NULL, NULL, 0, NULL, '/////////', 'https://t1.daumcdn.net/thumb/R1280x0/?fname=http://t1.daumcdn.net/brunch/service/user/xYA/image/POfKe6gl9y-h_7mdNTJZ3ycJLM0.png', NULL, '2019-06-14 11:24:15', '2019-06-14 11:28:43', ''),
(25, 14, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'http://www.yes24.com/Product/Goods/69288670?scode=032&OzSrank=1', '구글 스토리', '구글의 창립과정을 설명하는 책으로, 2005년에 출판되었지만 창립 20주년을 기념하여 편집 후 재출판된 도서이다.', '14', NULL, NULL, NULL, 0, NULL, '/////////', '', NULL, '2019-06-17 11:13:37', NULL, ''),
(26, 16, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'https://brunch.co.kr/@insight-kiju/1', '유튜브 CEO는 왜 박막례 할머니를 만났을까', '이노베이터 - 수잔 보이치키(Susan Wojcicki) 1화 | “나는 어릴 때 꿈이 이렇게 길게 질질 끄는 드레스를 입고 요렇게 커피 한 잔 탁 마시는 거, 그게 꿈이었어요. 그런데 그 꿈은 다 어디로 가버리고, 고생만 죽게 한 거여. 내가 꿈꾸는 대로 맘대로 안되더라고. 내 꿈은 다 어디로 가버렸어. 그래서 궁금해. 수잔은 꿈이 뭐예요? 유튜브의 꿈은 뭐예요?” 박막례 할머니가 물었다.  수잔 보이치키는 대답했다.', '16', NULL, NULL, NULL, 0, NULL, '/////////', 'https://t1.daumcdn.net/brunch/static/img/help/pc/img_share_default_800.png', NULL, '2019-06-18 19:17:13', NULL, ''),
(27, 19, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'https://seths.blog/2014/12/where-to-start/', '세스 고딘의 개인 블로그', '세스 고딘은 유명한 마케팅 구루로, 다양한 마케팅 이론과 저서들을 남겼다. 다만, 얼마 전 읽었던 그의 저서 <이것이 마케팅이다>에서 정의된 마케팅은 생각보다 더욱 기본적이면서 특별한 고객에게 초점을 맞추기를 요구했다.', '19', NULL, NULL, '///8///', 0, NULL, '/////////', '', NULL, '2019-06-19 10:48:34', '2019-07-15 03:09:52', ''),
(28, 19, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'http://businessmodelzen.co.kr/archives/5409', '대단히 성공적인 MVP (최소존속제품) 사례 10가지', '이 글은 Chris Bank가 최근 기고한 글을 저자 허락하에 번역 편집한 글입니다. (원문은 좌측 링크 통해 확인 가능)   오늘날 린스타트업을 채택한 기업들과 기술 공룡들은 성공적인 소프트웨어 제품을 개발하기 위한 시작점으로서 너나 할 것 없이 최소 존속 제품 (MVP)를 갈수록 더 많이 사용하고 있다. MVP가 실패하는 4가지 이유라는 글에서는 제품을 시장에 내놓은 과정에서의 주요 리스크와 이를…', '19', NULL, NULL, '///8///', 0, NULL, '/////////', 'http://businessmodelzen.co.kr/wp-content/uploads/2015/07/successful_mvp_04.jpg', NULL, '2019-06-19 10:49:07', '2019-07-15 03:09:52', ''),
(29, 12, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'https://newneek.co/', 'NEWNEEK', '뉴스를 큐레이션 후 (매주 3회) 메일함으로 요약해서 보내주는 뉴스레터 서비스.', '12', NULL, NULL, NULL, 0, NULL, '/////////', 'https://cdn.imweb.me/upload/S201812075c0a0389c78c4/5c0e5aaa214bb.png', NULL, '2019-06-19 16:03:46', NULL, ''),
(30, 19, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'https://9gag.com/', '9GAG: Go Fun The World', '9GAG has the best funny pics, gifs, videos, gaming, anime, manga, movie, tv, cosplay, sport, food, memes, cute, fail, wtf photos on the internet!', '19', NULL, NULL, '///8///', 0, NULL, '/////////', 'https://images-cdn.9gag.com/img/9gag-og.png', NULL, '2019-06-19 20:56:35', '2019-07-15 03:09:52', ''),
(31, 16, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'https://brunch.co.kr/@codethief/38', '스타트업 할 때 알았으면 좋았을 걸', '작게 작게 하세요 | 얼마 전에 아는 형을 통해서 몇 가지 개발/스타트업에 관련된 질문을 받은 적이 있었는데, 답변하다 보니 재밌어서 그중 하나를 블로그 글로 남겨봅니다.  (개발자의 관점으로!)  구체적으로 웹 서비스 혹은 앱 서비스 기반으로 창업을 할 때 어느 부분이 중요하다고 생각하는지? 예를 들어서 탄탄한 기획, 초기 자본, 기술력 등등  제 경험상 제일 중요한 건, 작', '16', NULL, NULL, NULL, 0, NULL, '/////////', 'https://t1.daumcdn.net/thumb/R1280x0/?fname=http://t1.daumcdn.net/brunch/service/user/34ES/image/HcoXAhqcvA1nOt-1uWzPWrWw_Ww.jpg', NULL, '2019-06-30 01:15:22', NULL, ''),
(33, 15, 'OySwyk6wFdYlaeZZFVvzhD1eaGQVJpIo0e09Hus7', NULL, NULL, 'huchiy@gmail.com', NULL, NULL, 'test', '12312', '312312', NULL, NULL, NULL, NULL, 0, NULL, '/////////', '', NULL, '2019-07-01 02:22:17', NULL, ''),
(34, 11, 'OySwyk6wFdYlaeZZFVvzhD1eaGQVJpIo0e09Hus7', NULL, NULL, 'huchiy@gmail.com', NULL, NULL, 'test', 'testtset123123', '123123123', NULL, NULL, NULL, NULL, 0, NULL, '/////////', '', NULL, '2019-07-01 02:23:24', NULL, ''),
(35, 3, 'OySwyk6wFdYlaeZZFVvzhD1eaGQVJpIo0e09Hus7', NULL, NULL, 'huchiy@gmail.com', NULL, NULL, '11111111111', '111111111', '111', NULL, NULL, NULL, NULL, 0, NULL, '/////////', '', NULL, '2019-07-01 03:44:10', NULL, ''),
(36, 2, 'OySwyk6wFdYlaeZZFVvzhD1eaGQVJpIo0e09Hus7', NULL, NULL, 'huchiy@gmail.com', NULL, NULL, '2222222', '222222222', '222222222222', NULL, NULL, NULL, NULL, 0, NULL, '/////////', '', NULL, '2019-07-01 03:44:16', NULL, ''),
(37, 20, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'http://thundermail.co.kr/thunder_kr/index.jsp', '대량메일발송 솔루션 썬더메일', '썬더메일은 이메일 마케팅 솔루션으로, 대량메일을 안정적으로 발송하고 발송된 결과를 다양한 통계로 제공합니다.', NULL, NULL, NULL, NULL, 0, NULL, '/////////', 'http://thundermail.co.kr/_res/thunder_kr/img/index/main_logo.gif', NULL, '2019-07-02 11:11:03', NULL, ''),
(38, 20, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'http://cosse.kr/', '처음소프트', 'COSSE 대량메일', NULL, NULL, NULL, NULL, 0, NULL, '/////////', '', NULL, '2019-07-02 11:11:37', NULL, ''),
(39, 20, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'https://www.hosting.kr/servlet/html?pgm_id=XHOSTING086200', '메가존', '아마존이 제공하는 클라우드 기반의 이메일 발송 솔루션\r\n대량메일 발송 솔루션', NULL, NULL, NULL, NULL, 0, NULL, '/////////', '', NULL, '2019-07-02 11:12:08', NULL, ''),
(40, 20, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'http://kr.humuson.com/postman', 'Postman (멀티 채널 마케팅 서비스)', '기업형 포스트맨(ASP)', NULL, NULL, NULL, NULL, 0, NULL, '/////////', '', NULL, '2019-07-02 11:12:29', NULL, ''),
(41, 20, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'http://www.crewcloud.net/UI/Center/KOIFPage/crewemail.html', '크루메일', '직접 개발한 메일 엔진을 사용해 빠른 송수신 속도를 자랑합니다.', NULL, NULL, NULL, NULL, 0, NULL, '/////////', '', NULL, '2019-07-02 11:12:56', NULL, ''),
(42, 19, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'http://thestrategist.io/podcasts-im-listening-to/', '지금 듣고 있는 팟캐스트들', '투자, 스타트업, 테크 팟캐스트 추천 \r\n- 전략과 스타트업에 대한 인사이트를 공유하는 개인 블로그.', NULL, NULL, NULL, '///8///', 0, NULL, '/////////', 'http://thestrategist-io.exactdn.com/wp-content/uploads/2019/03/william-iven-5894-unsplash.jpg', NULL, '2019-07-02 15:17:51', '2019-07-15 03:09:52', ''),
(43, 19, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'https://muchtrans.com/translations/software-disenchantment.ko.html', 'IT 산업의 문제점', '프로그래머로서의 환멸', NULL, NULL, NULL, '///8///', 0, NULL, '/IMG_1562197753860.jpeg////////', '', NULL, '2019-07-04 08:49:34', '2019-07-15 03:09:52', ''),
(44, 21, 'SkXbagU4iuJC0q9J1rZltT5inUhnFPtx9gLODH19', NULL, NULL, 'dlatngusch@gmail.com', NULL, NULL, 'https://developer.apple.com/documentation/xcode_release_notes/xcode_10_2_beta_release_notes/swift_5_release_notes_for_xcode_10_2_beta', 'Swift5', 'Swift5', NULL, NULL, NULL, NULL, 0, NULL, '/////////', '', NULL, '2019-07-05 11:12:22', NULL, ''),
(46, 22, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'http://hakdokman.com/', '학생독립만세', 'asdflknkwejtq', NULL, NULL, NULL, NULL, 0, NULL, '/////////', 'https://www.hakdokman.com/common/asset/meta/og_image.png', NULL, '2019-07-05 20:57:50', NULL, ''),
(47, 3, 'OySwyk6wFdYlaeZZFVvzhD1eaGQVJpIo0e09Hus7', NULL, NULL, 'huchiy@gmail.com', NULL, NULL, '123', '213', '123', NULL, NULL, NULL, NULL, 0, NULL, '/////////', '', NULL, '2019-07-12 17:39:13', NULL, ''),
(48, 11, 'OySwyk6wFdYlaeZZFVvzhD1eaGQVJpIo0e09Hus7', NULL, NULL, 'huchiy@gmail.com', NULL, NULL, '123', '123', '123', NULL, NULL, NULL, NULL, 0, NULL, '/////////', '', NULL, '2019-07-12 17:39:19', NULL, ''),
(50, 19, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'https://playbook.samaltman.com/', '샘알트만의 스타트업 강의', '-', NULL, NULL, NULL, NULL, 0, NULL, '/////////', '', NULL, '2019-08-02 17:15:56', NULL, ''),
(51, 19, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, 'https://medium.com/daangn/%ED%92%8B%EB%82%B4%EA%B8%B0-%EC%B0%BD%EC%97%85%EC%9E%90%EC%9D%98-%EC%8A%A4%ED%83%80%ED%8A%B8%EC%97%85-%EC%B0%BD%EC%97%85%ED%95%98%EA%B8%B0-2%ED%99%94-%EC%8A%A4%ED%83%80%ED%8A%B8%EC%97%85%EC%9D%84-%ED%95%98%EB%8A%94-%EC%9D%B4%EC%9', '-', '-', NULL, NULL, NULL, NULL, 0, NULL, '/////////', '', NULL, '2019-08-02 17:16:23', NULL, '');

-- --------------------------------------------------------

--
-- 테이블 구조 `Pka_Bookmark_comment`
--

CREATE TABLE `Pka_Bookmark_comment` (
  `PC_idx` int(11) NOT NULL,
  `PB_idx` int(11) DEFAULT NULL,
  `PU_idx` int(11) DEFAULT NULL,
  `token_val` varchar(255) NOT NULL COMMENT '기준값',
  `PU_userid` varchar(20) DEFAULT NULL,
  `PU_passwd` varchar(255) DEFAULT NULL,
  `PU_email` varchar(255) DEFAULT NULL,
  `PU_name` varchar(12) DEFAULT NULL,
  `PU_phone` varchar(13) DEFAULT NULL,
  `PU_url` varchar(255) DEFAULT NULL,
  `PU_subject` varchar(255) DEFAULT NULL,
  `PU_contents` text,
  `PU_category` varchar(255) DEFAULT NULL,
  `PU_open_ck` varchar(30) DEFAULT NULL,
  `PU_open_email` text,
  `PU_hit` int(11) NOT NULL DEFAULT '0',
  `PU_fileName` text,
  `PU_files` text,
  `PU_files_comment` text,
  `PU_joindate` datetime DEFAULT NULL,
  `PU_modifydate` datetime DEFAULT NULL,
  `PU_memo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `Pka_Bookmark_comment`
--

INSERT INTO `Pka_Bookmark_comment` (`PC_idx`, `PB_idx`, `PU_idx`, `token_val`, `PU_userid`, `PU_passwd`, `PU_email`, `PU_name`, `PU_phone`, `PU_url`, `PU_subject`, `PU_contents`, `PU_category`, `PU_open_ck`, `PU_open_email`, `PU_hit`, `PU_fileName`, `PU_files`, `PU_files_comment`, `PU_joindate`, `PU_modifydate`, `PU_memo`) VALUES
(4, 2, 5, 'OySwyk6wFdYlaeZZFVvzhD1eaGQVJpIo0e09Hus7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11111111333ㅈㅂㄷㅂㅈㄷ', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-05-23 02:15:42', NULL),
(5, 16, 2, 'OySwyk6wFdYlaeZZFVvzhD1eaGQVJpIo0e09Hus7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdf', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-05-23 02:37:58', NULL),
(6, 8, 9, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '아마존 계정 발급에 필요한 페이오니아 고객센터 번호를 여기서 찾았네요..', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-05-23 09:02:51', NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `Pka_Collection`
--

CREATE TABLE `Pka_Collection` (
  `PU_idx` int(11) NOT NULL,
  `token_val` varchar(255) NOT NULL COMMENT '기준값',
  `PU_userid` varchar(20) DEFAULT NULL,
  `PU_passwd` varchar(255) DEFAULT NULL,
  `PU_email` varchar(255) DEFAULT NULL,
  `PU_name` varchar(12) DEFAULT NULL,
  `PU_phone` varchar(13) DEFAULT NULL,
  `PU_subject` varchar(255) DEFAULT NULL,
  `PU_contents` text,
  `PU_category` varchar(255) DEFAULT NULL,
  `PU_open_ck` varchar(30) DEFAULT NULL,
  `PU_open_email` text,
  `PU_Collection` text,
  `PU_hit` int(11) NOT NULL DEFAULT '0',
  `PU_fileName` text,
  `PU_files` text,
  `PU_files_comment` text,
  `PU_joindate` datetime DEFAULT NULL,
  `PU_modifydate` datetime DEFAULT NULL,
  `PU_memo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `Pka_Collection`
--

INSERT INTO `Pka_Collection` (`PU_idx`, `token_val`, `PU_userid`, `PU_passwd`, `PU_email`, `PU_name`, `PU_phone`, `PU_subject`, `PU_contents`, `PU_category`, `PU_open_ck`, `PU_open_email`, `PU_Collection`, `PU_hit`, `PU_fileName`, `PU_files`, `PU_files_comment`, `PU_joindate`, `PU_modifydate`, `PU_memo`) VALUES
(2, 'OySwyk6wFdYlaeZZFVvzhD1eaGQVJpIo0e09Hus7', NULL, NULL, 'huchiy@gmail.com\r\n', NULL, NULL, '꼭 읽고 싶은 책 전자', '컬렉션에 대한 간단한 소개 및 설명문구 (글자수 제한) 컬렉션에 대한 간단한 소개 및 설명문구 (글자수 제한) 컬렉션에 대한 간단한 소개 및 설명문구', '1', '1', '', 'S7QysqrOtDKwLrYytFIyVrLOtDIEso2slAwNlKxrAQ==', 0, '', '/IMG_1558315202500.jpg////////', '', '2019-05-17 06:37:26', '2019-06-17 04:50:25', ''),
(3, 'OySwyk6wFdYlaeZZFVvzhD1eaGQVJpIo0e09Hus7', NULL, NULL, 'huchiy@gmail.com', NULL, NULL, 'SAP 개선 프로젝트 전자', '컬렉션에 대한 간단한 소개 및 설명문구 (글자수 제한) 컬렉션에 대한 간단한 소개 및 설명문구 (글자수 제한) 컬렉션에 대한 간단한 소개 및 설명문구', '1', '1', '', 'S7QysqrOtDKwLrYytFIyVrLOtDIEso2slAwNlKxrAQ==', 0, NULL, '/IMG_1558315241392.jpg////////', NULL, '2019-05-20 10:23:14', '2019-06-17 04:50:19', ''),
(5, 'AV9BsLm2ZweWA1zmdFNiVILe4WvHrNDuNhv3WepZ', NULL, NULL, 'hichoims@naver.com', NULL, NULL, '디자인', '디자인 컬렉션', '1', '1', '', '', 0, NULL, '/////////', NULL, '2019-05-20 17:00:11', NULL, ''),
(6, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P\r\n', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, '전자상거래 관련', '전자상거래 산업과 관련한 인사이트를 주는 링크들 모음', '1', '1', '', 'S7QytKrOtDKwLgYylEyVrGsB', 0, NULL, '/IMG_1558347941363.png////////', NULL, '2019-05-20 19:26:11', NULL, ''),
(7, 'AV9BsLm2ZweWA1zmdFNiVILe4WvHrNDuNhv3WepZ', NULL, NULL, 'hichoims@naver.com', NULL, NULL, '두번째컬렉션', 'ㅇㅇ', '2', '1', '', 'S7QysqrOtDKwLrYytFIyUbLOtDIEso2AHEMDcwNDIwtzMwNTQxMTCwtzY3NLMyXrWgA=', 0, NULL, '/////////', NULL, '2019-05-20 19:33:33', NULL, ''),
(8, 'OySwyk6wFdYlaeZZFVvzhD1eaGQVJpIo0e09Hus7\r\n', NULL, NULL, 'huchiy@gmail.com', NULL, NULL, 'test', 'test', '1', '1', '', NULL, 0, NULL, '/IMG_1558472005601.jpg////////', NULL, '2019-05-22 05:53:29', NULL, ''),
(9, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, '전자상거래 관련 링크 모음', '전자상거래에 관한 다양한 링크를 모아놓은 사이트입니다.', '1', '1', '', 'NcqxDYAwDATAXTLBvx1ivz0NZWpKxO7QIF15Z1ndu9BXGWuQEwgtKhQzF+IgRu/iH+Af44LS3CWkNPp5AQ==', 0, NULL, '/IMG_1558915741406.jpeg////////', NULL, '2019-05-22 13:09:48', '2019-05-27 09:09:08', ''),
(11, 'OySwyk6wFdYlaeZZFVvzhD1eaGQVJpIo0e09Hus7', NULL, NULL, 'huchiy@gmail.com', NULL, NULL, '전자test', 'test', '1', '3', 'huchiy@gmail.com', NULL, 0, NULL, '/IMG_1558892477478.jpeg////////', NULL, '2019-05-27 02:41:27', '2019-07-01 02:23:58', ''),
(12, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, '유익한 뉴스레터 모음', '요즘 즐겨보는 뉴스레터를 모아놓은 컬렉션입니다.', '1', '1', '', '', 0, NULL, '/IMG_1558915855737.jpg////////', NULL, '2019-05-27 09:10:23', '2019-05-27 09:10:56', ''),
(13, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, '소셜 네트워크 서비스 관련 좋은 자료', '소셜 네트워크 서비스 관련 - 초창기 기획, 프로덕트 매니지먼트, 인터뷰 등', '1', '1', '', '', 0, NULL, '/IMG_1558915952631.jpg////////', NULL, '2019-05-27 09:11:58', '2019-05-27 09:12:34', ''),
(14, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, '2019 리딩 리스트', '2019년에 읽은 책 리스트 및 간단한 독후감', '1', '1', '', NULL, 0, NULL, '/IMG_1559003774259.jpg////////', NULL, '2019-05-28 09:36:24', NULL, ''),
(15, 'OySwyk6wFdYlaeZZFVvzhD1eaGQVJpIo0e09Hus7', NULL, NULL, 'huchiy@gmail.com', NULL, NULL, '31test', '23123', '1', '2', 'pvpstar@naver.com', NULL, 0, NULL, '/////////', NULL, '2019-05-29 05:26:25', '2019-07-01 02:03:17', ''),
(16, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, '좋은 브런치 글', '브런치에서 특별히 영감을 준 페이지들에 대한 컬렉션', '1', '1', '', NULL, 0, NULL, '/IMG_1559136557576.jpg////////', NULL, '2019-05-29 22:26:49', '2019-05-29 22:29:27', ''),
(17, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, '아마존 셀링 아이템 소싱', '아마존에서 판매할 좋은 아이템 소싱용', '1', '2', 'hichoims@gmail.com', NULL, 0, NULL, '/IMG_1560416680891.png////////', NULL, '2019-05-30 15:19:44', '2019-06-13 18:04:41', ''),
(18, 'MGlTZq7FA5R9krVN7PwhnRhR0p8WCn2hfOrUH0au', NULL, NULL, 'hi.choims@gmail.com', NULL, NULL, 'Articles', 'Reading list', '1', '1', '', 'S7QytKrOtDKwLrYyslIyNFCyrgUA', 0, NULL, '/////////', NULL, '2019-06-01 19:52:50', NULL, ''),
(19, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, '영감을 주는 웹사이트들', '좋은 글귀, 영감을 주는 비즈니스 웹사이트, 경영인들의 블로그 등', '1', '1', '', 'S7QytKrOtDKwLgYylCyUrGsB', 0, NULL, '/IMG_1560908724622.jpg////////', NULL, '2019-06-19 10:45:12', '2019-06-19 10:45:27', ''),
(20, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, '대량메일 솔루션 기업', '회사 대량메일 솔루션 도입을 위한 업체 모음', '1', '3', '', NULL, 0, NULL, '/////////', NULL, '2019-07-02 11:10:53', '2019-07-02 15:19:08', ''),
(21, 'SkXbagU4iuJC0q9J1rZltT5inUhnFPtx9gLODH19', NULL, NULL, 'dlatngusch@gmail.com', NULL, NULL, 'Swift', 'iOS Swift 정보', '1', '1', '', NULL, 0, NULL, '/////////', NULL, '2019-07-05 11:06:05', NULL, ''),
(22, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, '해외축구 이적시장 관련 소식', '해외축구 리그의 이적시장과 관련된 소식을 모아봤습니다.', '1', '1', '', NULL, 0, NULL, '/IMG_1562316881241.jpg////////', NULL, '2019-07-05 17:55:10', NULL, '');

-- --------------------------------------------------------

--
-- 테이블 구조 `Pka_like`
--

CREATE TABLE `Pka_like` (
  `idx` int(11) NOT NULL,
  `PB_idx` varchar(255) NOT NULL,
  `token_val` varchar(255) NOT NULL,
  `like_ck` varchar(50) NOT NULL,
  `user_ip` varchar(30) DEFAULT NULL COMMENT '아이피',
  `PU_joindate` datetime DEFAULT NULL COMMENT '등록일'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='자유게시판';

--
-- 테이블의 덤프 데이터 `Pka_like`
--

INSERT INTO `Pka_like` (`idx`, `PB_idx`, `token_val`, `like_ck`, `user_ip`, `PU_joindate`) VALUES
(1, '', 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', 'Y', NULL, '2019-06-10 11:19:52');

-- --------------------------------------------------------

--
-- 테이블 구조 `Pka_Recommend`
--

CREATE TABLE `Pka_Recommend` (
  `PR_idx` int(11) NOT NULL,
  `PU_idx` int(30) DEFAULT NULL,
  `PB_idx` int(30) DEFAULT NULL,
  `PU_kind` varchar(50) DEFAULT NULL,
  `token_val` varchar(255) NOT NULL COMMENT '기준값',
  `PU_sortnum` int(30) DEFAULT NULL,
  `PU_userid` varchar(20) DEFAULT NULL,
  `PU_passwd` varchar(255) DEFAULT NULL,
  `PU_email` varchar(255) DEFAULT NULL,
  `PU_name` varchar(12) DEFAULT NULL,
  `PU_phone` varchar(13) DEFAULT NULL,
  `PU_url` varchar(255) DEFAULT NULL,
  `PU_subject` varchar(255) DEFAULT NULL,
  `PU_contents` text,
  `PU_category` varchar(255) DEFAULT NULL,
  `PU_open_ck` varchar(30) DEFAULT NULL,
  `PU_open_email` text,
  `PU_hit` int(11) NOT NULL DEFAULT '0',
  `PU_fileName` text,
  `PU_files` text,
  `PU_files_comment` text,
  `PU_joindate` datetime DEFAULT NULL,
  `PU_modifydate` datetime DEFAULT NULL,
  `PU_memo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `Pka_Recommend`
--

INSERT INTO `Pka_Recommend` (`PR_idx`, `PU_idx`, `PB_idx`, `PU_kind`, `token_val`, `PU_sortnum`, `PU_userid`, `PU_passwd`, `PU_email`, `PU_name`, `PU_phone`, `PU_url`, `PU_subject`, `PU_contents`, `PU_category`, `PU_open_ck`, `PU_open_email`, `PU_hit`, `PU_fileName`, `PU_files`, `PU_files_comment`, `PU_joindate`, `PU_modifydate`, `PU_memo`) VALUES
(10, 9, 0, 'collection', 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', 1, NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2019-05-23 02:40:23', NULL, NULL),
(13, 13, 0, 'collection', 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', 2, NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2019-05-27 10:55:29', NULL, NULL),
(14, 12, 0, 'collection', 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', 3, NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2019-05-27 10:55:31', NULL, NULL),
(15, 5, 0, 'collection', 'AV9BsLm2ZweWA1zmdFNiVILe4WvHrNDuNhv3WepZ', 5, NULL, NULL, 'hichoims@naver.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2019-05-27 10:55:38', NULL, NULL),
(16, 0, 22, 'bookmark', 'MGlTZq7FA5R9krVN7PwhnRhR0p8WCn2hfOrUH0au', 1, NULL, NULL, 'hi.choims@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2019-06-11 04:24:36', NULL, NULL),
(17, 8, 0, 'insiter', 'OySwyk6wFdYlaeZZFVvzhD1eaGQVJpIo0e09Hus7', 1, NULL, NULL, 'huchiy@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2019-06-11 04:50:29', NULL, NULL),
(18, 10, 0, 'insiter', 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', 2, NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2019-06-13 16:17:20', NULL, NULL),
(19, 11, 0, 'insiter', 'MGlTZq7FA5R9krVN7PwhnRhR0p8WCn2hfOrUH0au', 3, NULL, NULL, 'hi.choims@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2019-06-13 16:17:23', NULL, NULL),
(20, 0, 20, 'bookmark', 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', 8, NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2019-06-13 16:17:31', NULL, NULL),
(21, 0, 19, 'bookmark', 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', 8, NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2019-06-13 16:17:33', NULL, NULL),
(22, 12, 0, 'insiter', 'uBZC2I6nydA4LloQ1dHSPo0dFStXm6MkYK9JP5wA', 4, NULL, NULL, 'commontheater@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2019-06-14 14:11:17', NULL, NULL),
(23, 16, 0, 'collection', 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', 4, NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2019-06-14 14:12:34', NULL, NULL),
(24, 0, 24, 'bookmark', 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', 8, NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2019-06-14 14:13:15', NULL, NULL),
(25, 0, 18, 'bookmark', 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', 8, NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2019-06-14 14:13:23', NULL, NULL),
(26, 0, 10, 'bookmark', 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', 8, NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2019-06-14 14:13:26', NULL, NULL),
(27, 0, 8, 'bookmark', 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', 8, NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2019-06-14 14:13:28', NULL, NULL),
(28, 0, 7, 'bookmark', 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', 8, NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2019-06-14 14:13:29', NULL, NULL),
(29, 0, 6, 'bookmark', 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', 8, NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2019-06-14 14:13:30', NULL, NULL),
(30, 0, 5, 'bookmark', 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', 8, NULL, NULL, 'youngkwon315@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2019-06-14 14:13:30', NULL, NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `Pka_User`
--

CREATE TABLE `Pka_User` (
  `PU_idx` int(11) NOT NULL,
  `token_val` varchar(255) NOT NULL COMMENT '기준값',
  `PU_userid` varchar(255) DEFAULT NULL,
  `PU_passwd` varchar(255) DEFAULT NULL,
  `PU_email` varchar(255) NOT NULL,
  `PU_name` varchar(255) NOT NULL,
  `PU_Imageurl` varchar(255) DEFAULT NULL,
  `PU_Id_token` text,
  `PU_phone` varchar(13) DEFAULT NULL,
  `PU_profile` text,
  `PU_following` text,
  `PU_followers` text,
  `PU_Collection` text,
  `PU_files` text,
  `PU_partner_ck` varchar(20) DEFAULT NULL,
  `PU_joindate` datetime DEFAULT NULL,
  `PU_logindate` datetime DEFAULT NULL,
  `PU_modifydate` datetime DEFAULT NULL,
  `PU_memo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `Pka_User`
--

INSERT INTO `Pka_User` (`PU_idx`, `token_val`, `PU_userid`, `PU_passwd`, `PU_email`, `PU_name`, `PU_Imageurl`, `PU_Id_token`, `PU_phone`, `PU_profile`, `PU_following`, `PU_followers`, `PU_Collection`, `PU_files`, `PU_partner_ck`, `PU_joindate`, `PU_logindate`, `PU_modifydate`, `PU_memo`) VALUES
(8, 'OySwyk6wFdYlaeZZFVvzhD1eaGQVJpIo0e09Hus7', '114007961979748607510', NULL, 'huchiy@gmail.com', '이지은', 'https://lh6.googleusercontent.com/-QYSNPyeD-8E/AAAAAAAAAAI/AAAAAAAAAu8/jn113adty6Q/s96-c/photo.jpg', 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjA3YTA4MjgzOWYyZTcxYTliZjZjNTk2OTk2Yjk0NzM5Nzg1YWZkYzMiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwiYXpwIjoiMTY1MDMzOTIyNjE4LWE2bHFqZzVhaGpkYTZhYzJtbTJwYXFyaWlycmU4NXQxLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiYXVkIjoiMTY1MDMzOTIyNjE4LWE2bHFqZzVhaGpkYTZhYzJtbTJwYXFyaWlycmU4NXQxLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwic3ViIjoiMTE0MDA3OTYxOTc5NzQ4NjA3NTEwIiwiZW1haWwiOiJodWNoaXlAZ21haWwuY29tIiwiZW1haWxfdmVyaWZpZWQiOnRydWUsImF0X2hhc2giOiJSVVVObW1peW9pSzMxYXB5NzBXaXhRIiwibmFtZSI6IuygleyEseuvvCIsInBpY3R1cmUiOiJodHRwczovL2xoNi5nb29nbGV1c2VyY29udGVudC5jb20vLVFZU05QeWVELThFL0FBQUFBQUFBQUFJL0FBQUFBQUFBQXU4L2puMTEzYWR0eTZRL3M5Ni1jL3Bob3RvLmpwZyIsImdpdmVuX25hbWUiOiLshLHrr7wiLCJmYW1pbHlfbmFtZSI6IuyglSIsImxvY2FsZSI6ImtvIiwiaWF0IjoxNTU4NDkwODgzLCJleHAiOjE1NTg0OTQ0ODMsImp0aSI6ImFhZmQzYmVkNmU2ZjBhZmZiODBlNDc3ZTUyMDA5YjY2ZDA5YTQxNzUifQ.WOBJoiSHPOjDwadTS7MWzEScmvaAvrfXSuBcgPS0wgi6XLFBHWO7Lo9BH3Bc3uX5b9pMrbMmh1P5zmRc7Otwcfo82pIwXyKU9WMSkULKPF416eNmmybL2BRxumEwLeEhKDH35xkMp3ep4NLJFMQZ_BaQMELO1wslrNG1M5ctbc0c8dxbwJiPUk2_On3_Y5H4ME9LcDiFquoEwlxU2FMIulcHgALgfcPpuW5BpDALRLmEG9HhtTbHwn-RKifSt043MqL1BfT6IsxO9_wk8HOaFn5OSBX0f6prebTukrECHSP_5Bx8NN9gRjIjXgIfvmxgC7h8Bkak5HT8IZ1NdAduxA', NULL, '민트 초코', 'S7QytqrOtDKwLrYyslIyNFSyzrQyhHIMQBwjKMdIyboWAA==', 'S7QytKrOtDKwLrYyslIyNFCyrgUA', 'S7QytKrOtDKwLrYyslIytFSyrgUA', '/IMG_1558545653391.jpg////////', NULL, '2019-05-22 11:08:03', NULL, '2019-05-23 02:21:23', NULL),
(10, 'fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P', '107012876051448873796', NULL, 'youngkwon315@gmail.com', 'Youngbin Kwon', 'https://lh5.googleusercontent.com/-gm1Ycr1ZyzE/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rcrgKGv-mVIdbGKwSEOUVGS2Pufxg/s96-c/photo.jpg', NULL, NULL, '전자상거래, 독서, 온라인마케팅,\r\n 창업에 관련한 인사이트를 수집하는 것을 좋아합니다.', 'S7QytqrOtDKwLrYytFKyULLOtDIEso2slAwNQRwjKMdIyboWAA==', 'S7QysqrOtDKwLrYytFKyULLOtDIEso2slIwMlKxrAQ==', 'S7QytqrOtDKwLrYyslIyNFCyzrQyBHIMrZSMQWwjCNtIyboWAA==', '/IMG_1558570085735.jpg////////', NULL, '2019-05-22 13:03:49', NULL, '2019-06-19 21:46:27', NULL),
(11, 'MGlTZq7FA5R9krVN7PwhnRhR0p8WCn2hfOrUH0au', '103103216098233990899', NULL, 'hi.choims@gmail.com', 'Minsung Choi', 'https://lh6.googleusercontent.com/-TTDxnYOLJMU/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3reYgSxqIoV_6ofaeN3U-eXBJioQpA/s96-c/photo.jpg', NULL, NULL, NULL, '', 'S7QysqrOtDKwLrYytFKyULLOtDIEso2slAwNlKxrAQ==', 'S7QytKrOtDKwLrYyMrRSMjQwBiIjQzMDSwsjY2NLSwMLS0sl61oA', NULL, NULL, '2019-05-30 19:15:14', NULL, NULL, NULL),
(12, 'uBZC2I6nydA4LloQ1dHSPo0dFStXm6MkYK9JP5wA', '110893263057139879659', NULL, 'commontheater@gmail.com', '공공극장', 'https://lh5.googleusercontent.com/-aUWiO7tC1qY/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3re6lA4z7bFWmdG_eAG_ndCXuPGJGw/s96-c/photo.jpg', NULL, NULL, NULL, NULL, 'S7QysqrOtDKwLrYytFKyULLOtDIEso2slAwNlKxrAQ==', NULL, NULL, NULL, '2019-06-13 19:17:13', NULL, NULL, NULL),
(13, 'yV6RKBTEeSPrYpmBz87kKi4Uk5Dq5zSCixZ9o556', '103414212706522300654', NULL, 'choims@skylabentertainment.com', 'Minsung Choi', 'https://lh6.googleusercontent.com/-afdCCI6h4K8/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3re3GdNglbTegl1j3eQ_SGuWVYV3AA/s96-c/photo.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-17 15:11:09', NULL, NULL, NULL),
(14, 's4t7ZlYAvtvp5r6gVtMoNuF2XQUKrtbZvOrNkLKL', '117123013913110987871', NULL, 'hansanghun@airdesk.co.kr', '한상훈', 'https://lh6.googleusercontent.com/-W0xQ8bs6YuI/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3reyACglt8izzHJ6PATa3-mUykJoGA/s96-c/photo.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-17 17:49:04', NULL, NULL, NULL),
(15, 'tDv3kKRQQsl1wNJTg5BwRYrThvPC7cqkSsudSAFt', '109813259902166185766', NULL, 'joshephan0204@gmail.com', '한상훈', 'https://lh3.googleusercontent.com/-rkpQAAux-Us/AAAAAAAAAAI/AAAAAAAABMQ/f1IL6oFAnsg/s96-c/photo.jpg', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2019-06-19 18:52:56', NULL, NULL, NULL),
(16, 'QSCTbmiqHwDZdkBF88Af9EA0Nk3yiGl58lQFW5PB', '114908637676006164828', NULL, 'baekjunkeol@gmail.com', 'Baek JunKeol', 'https://lh3.googleusercontent.com/-UTpmUSETZYE/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rdIDuu0DNwyGST2J2jrkDlbLl8gMQ/s96-c/photo.jpg', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2019-06-20 13:42:16', NULL, NULL, NULL),
(17, 'SkXbagU4iuJC0q9J1rZltT5inUhnFPtx9gLODH19', '104369811481811039255', NULL, 'dlatngusch@gmail.com', 'suvely L', 'https://lh3.googleusercontent.com/-C0795CWedUY/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rd71Uv3r0jElQADy2PNCjaXZ4TXeQ/s96-c/photo.jpg', NULL, NULL, 'iOS Developer', NULL, NULL, NULL, '/IMG_1562292387625.jpg////////', NULL, '2019-07-05 11:02:06', NULL, '2019-07-05 11:06:53', NULL),
(18, '9eVnydm2gSsT5oA4TPiL1KivDaavDSK6TUvvgyfu', '101361895821408837995', NULL, 'hidon84@gmail.com', 'dondon', 'https://lh6.googleusercontent.com/-RBgpQFLjVEQ/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rfvpU-W_fN-meY_a3vh_5cTct1HPA/s96-c/photo.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-06 20:54:35', NULL, NULL, NULL),
(19, 'CgOIY70uMiVAgu9vjdqHx54HkO4irOPbjQCBxkuT', '108131318190719265741', NULL, 'pronist@naver.com', '정만수', 'https://lh6.googleusercontent.com/-X9LiHfaIQL8/AAAAAAAAAAI/AAAAAAAAA84/Vz1OH0BaUxs/s96-c/photo.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-10 15:07:18', NULL, NULL, NULL),
(20, 'ON2ujyziLzSHg7wWfBKsLI7e6MkLgLFq7n0BFLb8', '111355573377043800941', NULL, 'bong5956@gmail.com', '이봉학', 'https://lh5.googleusercontent.com/-kKVE5Bypo3k/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rfO967IERaT2rykOPP6QgqvtGh_2g/s96-c/photo.jpg', NULL, NULL, NULL, 'S7QytKrOtDKwLrYyslIyNFCyrgUA', NULL, NULL, NULL, NULL, '2019-08-06 16:58:36', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `wk_bbs_bookmark`
--

CREATE TABLE `wk_bbs_bookmark` (
  `idx` int(11) NOT NULL,
  `category` varchar(10) DEFAULT NULL COMMENT '카테고리',
  `indexNo` varchar(50) DEFAULT NULL COMMENT '고유아이디',
  `user_id` varchar(20) DEFAULT NULL COMMENT '아이디',
  `user_name` varchar(20) DEFAULT NULL COMMENT '이름',
  `user_level` int(11) DEFAULT NULL COMMENT '레벨',
  `nickName` varchar(30) DEFAULT NULL COMMENT '닉네임',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `pwd` varchar(255) DEFAULT NULL COMMENT '비밀번호',
  `headtext` varchar(255) DEFAULT NULL COMMENT '말머리',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `html` enum('Y','N') DEFAULT NULL COMMENT 'Html 사용여부',
  `content` text COMMENT '내용',
  `linkUrl` text COMMENT '링크경로',
  `movie` text COMMENT '동영상경로',
  `hit` int(11) DEFAULT '0' COMMENT '조회수',
  `recom` int(11) DEFAULT '0' COMMENT '추천수',
  `recom_id` text COMMENT '추천아이디',
  `notice` enum('Y','N') DEFAULT 'N' COMMENT '공지글여부',
  `secret` enum('Y','N') DEFAULT 'N' COMMENT '비빌글여부',
  `view_ck` enum('Y','N') DEFAULT 'Y' COMMENT '노출여부',
  `fileName` text COMMENT '첨부파일 실제이름',
  `files` text COMMENT '첨부파일 변환이름',
  `files_comment` text COMMENT '파일설명',
  `fno` int(11) DEFAULT NULL COMMENT '글번호',
  `thread` varchar(255) DEFAULT NULL COMMENT '답변글번호',
  `user_ip` varchar(30) DEFAULT NULL COMMENT '아이피',
  `reg_date` int(11) DEFAULT NULL COMMENT '등록일',
  `date_tm` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '등록일',
  `pg_gb` varchar(10) DEFAULT NULL COMMENT '기기구분',
  `tb_gubun` varchar(40) DEFAULT NULL COMMENT '게시판구분',
  `sort_num` int(11) DEFAULT '0' COMMENT '순서'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='자유게시판';

-- --------------------------------------------------------

--
-- 테이블 구조 `wk_bbs_bookmark_comment`
--

CREATE TABLE `wk_bbs_bookmark_comment` (
  `idx` int(11) NOT NULL,
  `Bidx` int(11) DEFAULT NULL COMMENT '게시판인덱스값',
  `indexNo` varchar(50) DEFAULT NULL COMMENT '고유아이디',
  `fb_tw_do` varchar(10) DEFAULT NULL COMMENT 'sns선택',
  `user_id` varchar(20) DEFAULT NULL COMMENT '아이디',
  `user_name` varchar(20) DEFAULT NULL COMMENT '이름',
  `nickName` varchar(30) DEFAULT NULL COMMENT '닉네임',
  `pwd` varchar(255) DEFAULT NULL COMMENT '비밀번호',
  `content` text COMMENT '내용',
  `view_ck` enum('Y','N') DEFAULT 'Y' COMMENT '노출여부',
  `user_ip` varchar(30) DEFAULT NULL COMMENT '아이피',
  `reg_date` int(11) DEFAULT NULL COMMENT '등록일',
  `date_tm` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '등록일'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='자유게시판';

--
-- 테이블의 덤프 데이터 `wk_bbs_bookmark_comment`
--

INSERT INTO `wk_bbs_bookmark_comment` (`idx`, `Bidx`, `indexNo`, `fb_tw_do`, `user_id`, `user_name`, `nickName`, `pwd`, `content`, `view_ck`, `user_ip`, `reg_date`, `date_tm`) VALUES
(1, 16, NULL, NULL, '', '노래강사', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '월암 선생님 우리 구로 노인복지관 산악회 발족에 축하 말씀과 산행에 도움이 되는 좋은 말씀 잘읽어습니다 감사합니다  노래강사 이수철 올림', 'Y', '210.121.218.233', 1111060936, '2005-03-17 21:02:16'),
(2, 5, NULL, NULL, '', '노래강사', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '요즘 제가 빠쁜일로 인텃을 검색할 시간이 없어습니다  오늘잠시 2층 컴퓨터 방에 들려 인터넷을 검색하다 구로 노인 복지관 홈피가 새롭게 개설된것을 보았습니다 총반장님 께서 등산 안내글을 보고  우리 구로노인복지관 등산 동우리 회가 하루 빨리 활성화되기를 기대하면서 꼬리글을 올 립니다 노래강사 이수철 올림', 'Y', '210.121.218.233', 1111061762, '2005-03-17 21:16:02'),
(3, 13, NULL, NULL, '', '노래강사', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '저는 구로노인복지관 노래강사 이수철 입니다 멀리 부산에서\r\n저의 홈피 축하글 을 올려 주셔서 고맙습니다', 'Y', '210.121.218.233', 1111196104, '2005-03-19 10:35:04'),
(4, 12, NULL, NULL, '', '노래강사', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '구로노인 홈피 운영자님 감사 합니다\r\n항상 초심을 잃치 않고 봉사 하겠다는 마음 고맙습니다\r\n\r\n실버밴드 악단장 이수철', 'Y', '210.121.218.233', 1111196383, '2005-03-19 10:39:43'),
(5, 8, NULL, NULL, '', '노래강사', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '새로운 시작은 항상 신선한 것이지요 좋은 동영상 글 잘읽 었습니다\r\n\r\n노래강사 이수철 올림', 'Y', '210.121.218.233', 1111197025, '2005-03-19 10:50:25'),
(6, 4, NULL, NULL, '', '노래강사', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '차상희 선생 오랬 만입니다 다른 복지관 으로 전근 되여도 구로 노인 복지관을 잊지 않고 \r\n축하 메세지 까지 올려 주니 감사합니다 \r\n노래강사 이수철', 'Y', '210.121.218.233', 1111197337, '2005-03-19 10:55:37'),
(7, 24, NULL, NULL, '', '노래강사', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '위에쓴 글 내용중 누리꾼 이란 단어는 사이버 이용자 네티진등 을 통틀어 지칭 하는 순수한 우리말 신조어 입니다', 'Y', '210.121.218.233', 1111201564, '2005-03-19 12:06:04'),
(8, 24, NULL, NULL, '', '소향', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '노래강사 님 올리신글 동감 입니다 저는 구로 노인 복지관 회원이며 컴퓨터 배우고 있는 왕초보입니다 우연히 다음 카페 수선화 둥지 회원에 가입하여 처음으로 자유 게시판에 글을 올렸는데 의로로 운영자 이신  수선화 님 과 한나님 별나라님 이 좋은 글을 올렸다고 꼬리말을 달아 주어\r\n고마 웠습니다\r\n', 'Y', '210.121.218.233', 1111206520, '2005-03-19 13:28:40'),
(9, 24, NULL, NULL, '', '이화', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '선생님글 잘일겄읍니다.지당한 말씀입니다.\r\n설리 홍조라는 뜻도 알게되였읍니다.감사합니다', 'Y', '211.201.234.183', 1111212174, '2005-03-19 15:02:54'),
(10, 26, NULL, NULL, '', '노래강사', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '봄내음이 물씬 풍기는 동영상과 소중한 오늘 하루 시한편 잘읽고 갑니다', 'Y', '210.121.218.233', 1111218165, '2005-03-19 16:42:45'),
(11, 24, NULL, NULL, '', '노래강사', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '이화님의 꼬리글 감사 합니다 더욱더 좋은 글많이 올려주십시요', 'Y', '210.121.218.233', 1111218506, '2005-03-19 16:48:26'),
(12, 20, NULL, NULL, '', '지화', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '축하말씀 감사합니다..^^', 'Y', '61.34.212.6', 1111735200, '2005-03-25 16:20:00'),
(13, 63, NULL, NULL, '', '황창현', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'ㅏ', 'Y', '220.65.71.5', 1112934420, '2005-04-08 13:27:00'),
(14, 63, NULL, NULL, '', '황창현', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '이거 저꺼에염 저 몰르고 이름을 못&amp;#50043;어염 ㅈㅅ해염 이름 몰라 보개해서염', 'Y', '220.65.71.5', 1112934526, '2005-04-08 13:28:46'),
(15, 63, NULL, NULL, '', '황창현', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '이거왜이러지 이름을 못 뭐뭐뭐 &amp;#50043;는데 이상하케 나온다\r\n', 'Y', '220.65.71.5', 1112934582, '2005-04-08 13:29:42'),
(16, 66, NULL, NULL, '', '±이뽀˝나라┼', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '옥상이 그렇게 가고싶어?', 'Y', '220.65.71.5', 1112935086, '2005-04-08 13:38:06'),
(17, 75, NULL, NULL, '', '∑ㅅrㄹ5냔', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '이모디콘 어디있니?\r\n', 'Y', '220.65.71.5', 1112935202, '2005-04-08 13:40:02'),
(18, 29, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '.....\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Y', '220.65.71.5', 1112935273, '2005-04-08 13:41:13'),
(19, 79, NULL, NULL, '', '@(≡∇≡)@', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '하은아! 잘썼다.', 'Y', '220.65.71.5', 1112935334, '2005-04-08 13:42:14'),
(20, 79, NULL, NULL, '', '☆♡아라하은♡☆', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '역시..\r\n내글은 너무 감ㄷ동적일정도로 너무잘써!\r\n내가나에게감동먹었어!', 'Y', '220.65.71.5', 1112935344, '2005-04-08 13:42:24'),
(21, 62, NULL, NULL, '', '하은', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '와!\r\n브라보!\r\n감동!!감동!!', 'Y', '220.65.71.5', 1112935424, '2005-04-08 13:43:44'),
(22, 63, NULL, NULL, '', '이게뭐냐!이게. 장난', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '좋아?행복해?사랑해??', 'Y', '220.65.71.5', 1112935498, '2005-04-08 13:44:58'),
(23, 86, NULL, NULL, '', '전호영', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', ' 지수야,너 왠일로 할머니,할아버지들께 건강하시라고 하니?\r\n 보통때면 쯧쯧..\r\n    ㅋㅋ(밑을 좀 더 봐~)\r\n\r\n\r\n지수야~장난이야.짝!짝! 뽕이얌~', 'Y', '220.65.71.5', 1112935542, '2005-04-08 13:45:42'),
(24, 80, NULL, NULL, '', '킥킥 첫글짜느유용', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '하이 찬우 언제 놀수있냐??\r\n', 'Y', '220.65.71.5', 1112935543, '2005-04-08 13:45:43'),
(25, 78, NULL, NULL, '', 'ㅗㅗㅜㅜ', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '준협은 ㅗ ㅗ ㅜ ㅜ 임.', 'Y', '220.65.71.5', 1112935562, '2005-04-08 13:46:02'),
(26, 73, NULL, NULL, '', '‘부⊆zㅓ운낭´', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '잘 했네~', 'Y', '220.65.71.5', 1112935594, '2005-04-08 13:46:34'),
(27, 66, NULL, NULL, '', 'ㅎ ㅓ ㄹ', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '헐~이상..', 'Y', '220.65.71.5', 1112935603, '2005-04-08 13:46:43'),
(28, 79, NULL, NULL, '', '유용재', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '아라냐? 하은이냥??', 'Y', '218.50.120.13', 1113564360, '2005-04-15 20:26:00'),
(29, 74, NULL, NULL, '', '나', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '으으으 냐냐냐냐냐냐냐냐냐냐냐냐냐', 'Y', '218.50.120.13', 1113564452, '2005-04-15 20:27:32'),
(30, 74, NULL, NULL, '', '나', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '왜 캐 없냐??????', 'Y', '218.50.120.13', 1113564491, '2005-04-15 20:28:11'),
(31, 89, NULL, NULL, '', '딸기', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요\r\n저.....은정이에요', 'Y', '61.75.39.186', 1113978388, '2005-04-20 15:26:28'),
(32, 105, NULL, NULL, '', '딸기', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요.\r\n', 'Y', '61.75.39.186', 1113978600, '2005-04-20 15:30:00'),
(33, 40, NULL, NULL, '', '딸기', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '뭐라고쓴지뭐르겠다.', 'Y', '61.75.39.186', 1113978762, '2005-04-20 15:32:42'),
(34, 111, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요?\r\n저희 복지관의 전산정보학과를 이용하시고 싶으시다고요?\r\n먼저 구로노인종합복지관에 회원가입이 되어 있는지 확인하시고요.\r\n회원가입시 구비서류는 주민등록증, 사진2매입니다.\r\n다음번 전산정보학과 프로그램 접수는 8월중에 있을 예정이며 요청하시는데로 저희 복지관 홈페이지에 공고하도록 하겠습니다.\r\n감사합니다.', 'Y', '61.34.212.6', 1115616380, '2005-05-09 14:26:20'),
(35, 62, NULL, NULL, '', '딸기', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '와!\r\n아라!\r\n짱!이야!', 'Y', '61.75.39.186', 1120120468, '2005-06-30 17:34:28'),
(36, 89, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '나는 오늘 선생님과 구로노인복지관에서. 많은것을 알았다.그런데 안내 하는선생님이름이§김은숙이었다. 이름이참 예쁘다. 나도그런 예쁜이름을 같고싶었다.그리고 올때 뒷문으로나갔다. 난 너무♬ 궁금해서 물어봤느데 주차장 도보고 간다고 뒷문으로나온거다.☞☞☞☞☞☞☞☞ ', 'Y', '61.75.39.186', 1120120531, '2005-06-30 17:35:31'),
(37, 82, NULL, NULL, '', '딸기', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '♬ㅋㅋㅋ \r\n...', 'Y', '61.75.39.186', 1120120646, '2005-06-30 17:37:26'),
(38, 177, NULL, NULL, '', '고언자', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '홈피 운영자께 한 말씀 올립니다.\r\n셔틀버스운행, 메뉴판 등이 바뀌지 않은 채 그대로 있습니다.\r\n개선 해 주시길 기대 합니다.', 'Y', '210.120.17.125', 1125618553, '2005-09-02 08:49:13'),
(39, 220, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '복지관 사업에 대한 문의는 전화로 받습니다.', 'Y', '211.201.234.183', 1133752850, '2005-12-05 12:20:50'),
(40, 251, NULL, NULL, '', '유신사', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '한해동안 복지관 운영에 한치의 오차도 없게 운영하여 주시기를 바랍니다\r\n부탁의 말슴은 \r\n1.  너무나 텃세를 하는분이 있는데 시정을 바랍니다 우리60대붙어89십대고요 어린애도 아닌데?\r\n2.  색안경 쓰고 보지 않았스면 합니다 총반장께서 앞장서서 시정을 부탁 합니다', 'Y', '220.86.119.115', 1138591263, '2006-01-30 12:21:03'),
(41, 251, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '구로 복지관 전어르신들님 올해에도 한분의 낙오 없이 겅강과 행복 하고 즐겁게\r\n\r\n 한해를 보내주시기 빕니다 !^*^', 'Y', '220.86.119.115', 1138591405, '2006-01-30 12:23:25'),
(42, 251, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '총반장님 한쪽으로 치우치지말고요 잘못하면 꾸중도 하고 잘하면 친찬도 하여 주면서 \r\n\r\n힘들지만 불평 안나오게 운영 하여주세요 감가합니다!^*^', 'Y', '220.86.119.115', 1138591578, '2006-01-30 12:26:18'),
(43, 256, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '저희 복지관에서도 현재 가락장구반을 운영하고 있어 신규반 개설이나 강사채용계획이 없습니다.\r\n추후 강사채용 시 공지하도록 하겠습니다.\r\n감사합니다.', 'Y', '61.34.212.6', 1139886636, '2006-02-14 12:10:36'),
(137, 6249, NULL, NULL, '', '민들레', '', '*9AD05ACAC9B0FAD1BB7EF1E76E42580E4F2FC9D7', '', 'Y', '58.234.145.55', 1511990840, '2017-11-30 06:27:20'),
(45, 309, NULL, NULL, '', '청-춘', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '답이 허위입니다 대나제 여러 어르신 들이 보는앞에서 본인 허락 없이 뒤에서 두번 씩이나 안아주는것이 복지관 총무부장의 인사법인지 알고 푸며 눈을 가렷다고 하는데 당사사 죽지 않고 살아 있스며 수치심 때문애 집에서 칩거 하고 있습니다 왜거짓말을 하는지요 지위를 이용하여 목적을 달성 하였다고 보는지요 ? 늙지도도 않고 더젊어 졌네요 하는소리의 의미는 잘못 하엿스면 시인하고  사과를 하여야지 부장실로 불러다가하는소리 관장님 앞에가서도 그대로 고하라고요 총무부장이란 직위를 이용하여 그렇게 하여도 되는지 되 묻고푸네요 여러사람 중에서 \r\n그사람만 안아 주웠는지요 ?  확실한 답변 하세여 부장님', 'Y', '220.86.119.134', 1143339577, '2006-03-26 11:19:37'),
(46, 427, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요 구로노인 결연담당자입니다.\r\n일단 구로노인복지관 후원사업에 동참해 주셔서 감사드립니다.\r\n후원자님께서 보내주신 신청서는 잘 받았습니다. \r\n현재 전산적으로 결연절차는 완료된 상태이고, 관련된 서류를 오늘내로 우편으로 보내드리겠습니다. 혹시 문의사항이 있으시면 837-9595로 언제든지 연락주십시오. 감사합니다^^', 'Y', '211.212.213.58', 1156386192, '2006-08-24 11:23:12'),
(47, 410, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요. 구로노인복지관 후원담당자입니다.\r\n복지관 후원사업에 관심 갖어 주셔서 감사합니다.\r\n후원자님의 정성과 사랑을 잘 받아 복지관 어르신 뿐 아니라 구로구내 어려우신 분들에게 고이 전달하도록 하겠습니다. 다시 한번 감사드립니다.\r\n추신)답변이 너무 늦어진 점 진심으로 사과 말씀드립니다. ', 'Y', '211.212.213.58', 1156386399, '2006-08-24 11:26:39'),
(48, 506, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '손혜원 후원자님 안녕하세요?\r\n전에 전화드린 결연후원담당 서효열 사회복지사입니다.\r\n먼저 후원과정이 오래걸려 직접 문의를 하시게끔 버거롭게 해드려 진심으로 사과 말씀 올립니다.\r\n후원자님의 개인 메일을 통해 문의사항에 대한 자세한 답변을 보내드렸습니다..\r\n확인하시고 궁금한 사항이나 기타 다른 문의사항이 있으시다면 언제든지 게시판이나 전화(837-9595)를 통해 문의해 주시기 바랍니다..\r\n복지관 결연후원사업에 깊게 관심 가져주셔서 감사합니다.\r\n', 'Y', '211.44.242.118', 1162869127, '2006-11-07 12:12:07'),
(49, 577, NULL, NULL, '', '옆집 아저씨', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '근로 능력을 제공하는 사람 입장에서 근무하게 될 곳의 급여를 문의하는 것은 절대 실례가 아닙니다. 당연한 권리입니다. 우리 이제는 급여문제에 너무 위축되지 마십시다.', 'Y', '61.101.150.97', 1169193640, '2007-01-19 17:00:40'),
(50, 939, NULL, NULL, '', 'skyy1212', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'ㅠㅠ 복지관에서 근무하시는 분들 공무원 아닙니까?\r\n요즘 취업고에 시달리는 젊은 인재들을 위해 그런 분들은 좀 물러나시는게 어떨지... ', 'Y', '211.173.9.14', 1204184388, '2008-02-28 16:39:48'),
(51, 1015, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요~ \r\n학생께 먼저 사과드려야겠네요... 지금 답변하기엔 시기적으로 민망하지만, \r\n저희 기관에 전화문의 했으리라 생각하구요, \r\n- 저희기관은 7월경에 8명정도로 실습이 진행될 예정이고, \r\n- 공문접수 선착순으로 모집 예정입니다. \r\n- 5월말정도에8 명 확정인원 선정되면 해당학교 사회복지학과 조교실로 통보예정입니다.\r\n- 참고로 해주시고 자세한 문의 필요하시면 복지관 실습담당자를 찾아주세요~   \r\n\r\n ', 'Y', '61.34.212.6', 1211187445, '2008-05-19 17:57:25'),
(52, 1098, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '감사합니다. 앞으로도 더욱 어르신들을 위해 노력하는 구로노인종합복지관이 되겠습니다~', 'Y', '61.34.212.6', 1216879649, '2008-07-24 15:07:29'),
(53, 1331, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '저희 구로노인종합복지관에 관심 가져주셔서 감사합니다. 곧 수정된 약도를 올릴 예정입니다. \r\n좋은 하루되세요. ^^', 'Y', '61.34.212.6', 1245229198, '2009-06-17 17:59:58'),
(54, 1343, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '2010년 신규 시간표 인쇄 시 참고하여 기입하도록 하겠습니다. ', 'Y', '61.34.212.6', 1253062884, '2009-09-16 10:01:24'),
(55, 1344, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요? 2009년 겨울방학 실습과 관련한 공지사항은 아직 없습니다. 추후에 게시판에 공지되는 내용을 참고하세요. 감사합니다. ^^ \r\n \r\n \r\n', 'Y', '61.34.212.6', 1253511686, '2009-09-21 14:41:26'),
(56, 1346, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요? 위와 관련한 자세한 사항은 전화하셔서 복지과장님께 문의해주세요. 감사힙니다.', 'Y', '61.34.212.6', 1253751067, '2009-09-24 09:11:07'),
(57, 1347, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요? 공지사항 게시판 No.170, 또는 No 192의 예전 자료를 참고하시면 도움되실듯 합니다. 감사합니다. ', 'Y', '61.34.212.6', 1254188819, '2009-09-29 10:46:59'),
(58, 1353, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요? 추후에 게시판을 통해 공지 할 계획을 갖고 있으며, 좀 더 자세한 내용은 담당 복지과장을 통해 전화 문의하세요. 감사합니다. ', 'Y', '61.34.212.6', 1258071253, '2009-11-13 09:14:13'),
(59, 1350, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '여러번 실습문의 하시게한점 사과드립니다. 저희기관에서 봉사도 하셨었다니 반갑네요. No1357번 게시물로 참고하시어, 해당학교 과사무실에서 저희 기관으로 실습요청 공문을 보내주시면 됩니다. 선착순이니깐 참고하세요~ 기회가 되면 뵙겠습니다^^', 'Y', '61.34.212.6', 1258444488, '2009-11-17 16:54:48'),
(60, 1355, NULL, NULL, '', '도송 구재운', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '09,11월 복지관 예술제 사진 일부를 올리고,\r\n추가  사진이 필요하신 분은 별도 보내 드리겠습니다 --도송', 'Y', '221.139.29.185', 1258452665, '2009-11-17 19:11:05'),
(61, 1357, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요? 저희 구로노인종합복지관에 관심 가져 주셔서 감사합니다. 문의하신 사회교육 프로그램 접수는 2010년 1/11(월) ~ 1/13(수)이며, 1/14(목) 추첨 및 결과발표, 1/18(월) 개강입니다.', 'Y', '61.34.212.6', 1259569339, '2009-11-30 17:22:19'),
(62, 1360, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '멋쟁이할머님께!\r\n저는 지나가는 나그네입니다.어르신의 건의처럼 강사가 인사를 해도 못본척하고 무시하는 것 같아 기분나쁘신 것은 충분히 이해가 갑니다.그러나 모든 사람들은 죽을 때까지 배우고 깨우칩니다.자식들도 그렇고 요즘 젊은 대학생, 고등학생들도 마찬가지입니다.\r\n무엇이 잘 안되시면 선생님께 말씀하셔서 이런이런부분은 시정해 달라고 하시면 아마도 강사분이 어르신의 말씀을 듣지 않을까 생각되구요, 어르신 한분 한분의 비위를 다 맞추다보면 실제로 배가 산으로 갈 수 있습니다.\r\n어르신들이 강사를 가지고 구청장님께 건의하는 것은 맞지 않는 것입니다.수업 중에 선생님과 말씀을 하시든지 수업 후에 건의를 하시거나 복지관 담당자와 강사와 함께 상담을 하신 후에 불만을 토로하셔도 될 것 같습니다.   ', 'Y', '61.42.54.131', 1262854767, '2010-01-07 17:59:27'),
(63, 1360, NULL, NULL, '', '이춘화', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '저는 지하노래방을 가끔 이용을 하는데 노래방기기가  정상이 아니라 취미로 즐기기엔\r\n불평들이 많습니다.소리가 나왔다 안나왔다 잡음도나고 문론  여러분이 쓰다보니 고장이  \r\n잦을수 있겠지만 그기간이 너무 오래된것같아 건의드립니다.\r\n빨리 고쳐주세요.부탁 드릴께요.\r\n\r\n', 'Y', '116.34.152.79', 1264416415, '2010-01-25 19:46:55'),
(64, 1371, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '본 복지관에서는 어르신들께 흘러간 노래와 최신가요를 배울 수 있는 가요교실을 주 3회 진행하고 있습니다. 또한,가요교실에 배운 노래들을 어르신들께서 연습할 수 있도록 지하 노래방에서 월~목요일 오후 1시부터 2시 30분까지 노래방을 운영하고 있습니다. 이에 신곡을 배운 어르신들께서 지하 노래방에 신곡이 입력이 되어 있지 않아 불편하다는 의견이 있어 5월 중으로 지하노래방의 기계에 따뜻한 신곡을 추가로 입력시키도록 하겠습니다.\r\n구로노인종합복지관에 관심과 애정을 보여주시는 모든 어르신들의 건강과 행복을 기원합니다. \r\n감사합니다.\r\n\r\n', 'Y', '61.34.212.6', 1272939003, '2010-05-04 11:10:03'),
(65, 1426, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요! 구로노인종합복지관 류림화 팀장입니다. \r\n기다리셨을텐데 답변이 늦어서 죄송합니다. \r\n올려주신 글을 찬찬히 읽어보았습니다. 저희 복지관은 신도림역에 위치한 &#039;구로노인종합복지관&#039;입니다. 올리신 글의 내용으로 보아 &#039;구로종합사회복지관&#039;에 올리시려던 글인듯 하네요.\r\n비록 저희 복지관에서 일어난 내용은 아니지만, 글을 읽으며 업무 시 저희들의 자세와 마음가짐에 대해 다시 한번 되돌아 보게 됩니다. \r\n말씀해주신 바를 토대로 저희 복지관 역시 고객(어르신, 자원봉사자, 후원자 등)을 위한 서비스와 배려에 더욱 주의를 기울여야겠단 다짐을 해봅니다. \r\n부디, 이번 일이 마음 편히 잘 해결되었으면 하는 바람입니다. 감사합니다.', 'Y', '61.34.212.6', 1305183033, '2011-05-12 15:50:33'),
(66, 1476, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '뚜레주르 신도림초점에서 복지관과 지역 어르신들을 위해 지원해 주시는 맛있는 케&amp;#51084;입니다. 구로구 안에서 진행되는 많은 나눔들을 통해 살기 좋은 구로구가 되는 것이 느껴지는 하루 입니다 ^^ ', 'Y', '61.34.212.6', 1354237025, '2012-11-30 09:57:05'),
(67, 1024, NULL, NULL, '', 'RabossDot', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Здарова! \r\nвидеосъемка спб цены\r\nвидеосъемка спб детских праздников\r\nвидеосъемка клипа спб\r\n \r\nhttp://piano-digital.ru \r\nhttp://piano-digital.ru/videosemka-vypiski-iz-roddoma-spb.html\r\nhttp://piano-digital.ru/videosemka-spb-snyat-videorolik.html\r\n', 'Y', '77.244.21.32', 1437391767, '2015-07-20 20:29:27'),
(68, 1024, NULL, NULL, '', 'Angelmix', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Le Monde.fr publie son texte en integralite. Depuis bientot un an, ils ne se sont pas bouscules.  http://lenitsky.com/ Disparue l epee de Damocles. Depuis, elle n a rien recu. 4 Les operations de tannerie 1,93 million . ', 'Y', '178.94.20.54', 1437449541, '2015-07-21 12:32:21'),
(69, 1669, NULL, NULL, '', '도데체가', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '머징...오늘 여기 시끄럽겠네요 도데체가 천주교에서는 이리 가르치나요\r\n이러니 개신교나 천주교나 욕을 듣는겁니다 \r\n요즘 하나님어쩌고 하는 단체는 상받은걸로 광고하고 날리인데 ...\r\n이런거 보면 반성해야 합니다', 'Y', '183.104.108.156', 1437695338, '2015-07-24 08:48:58'),
(70, 1669, NULL, NULL, '', '환갑은노인?', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '총리가 사진상의 어르신보다 더 나이를 드셨나보죠~~~~ 총리는 1957년 4월 15일생이시네요~ \r\n요즘은 환갑두 않되신 분이 노인소리 듣나봐요~ ㅎ ', 'Y', '14.48.153.36', 1437701843, '2015-07-24 10:37:23'),
(71, 1669, NULL, NULL, '', '머저리들', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '알아서기는 머저리같은 인간들!!!', 'Y', '211.185.177.2', 1437702280, '2015-07-24 10:44:40'),
(72, 1024, NULL, NULL, '', 'Angelmix', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Neveu dans un requisitoire guerrier. Ils craignent une reduction du nombre de boutiques.  http://lenitsky.com/ Mais le reste est lie a nos comportements. J aurai une grosse cicatrice en bas de mon ventre. Les avocats comme leurs clients etaient atterres. ', 'Y', '178.94.53.243', 1437705348, '2015-07-24 11:35:48'),
(73, 1024, NULL, NULL, '', 'Angelmix', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'de limiter les regles au strict minimum. Pour beaucoup sous l impulsion des jeunes.  &lt;a href=&quot;http://lenitsky.com/&quot;&gt;Andrey Lenitsky&lt;/a&gt; Plus d un tiers des malades en sont morts. Un pouce leve et un sourire des benevoles. Trop tard pour cette annee. ', 'Y', '178.94.53.243', 1437705811, '2015-07-24 11:43:31'),
(74, 1666, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '슬프네요 높으신분 접대하느라 가장 높이 대접해드려야 어르신들께는 이런 대접이라니...당당하지못하네요 발바닥 비비는 놀인 이제그만', 'Y', '121.135.129.16', 1437802233, '2015-07-25 14:30:33'),
(75, 1024, NULL, NULL, '', 'Janhmix', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Je suis profondement triste, au bord des larmes. Mais ce serait du plus mauvais effet.  http://lenitsky.com Estelle Conraux y reflechit aussi. Pour l instant, le sevrage est trop cher. Le CCNE rendra un rapport apres les etats generaux. ', 'Y', '178.94.61.51', 1437811966, '2015-07-25 17:12:46'),
(76, 1024, NULL, NULL, '', 'Yanhmix', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'доска опционов фортс стохастик rsi для бинарных опционов   http://option.inava.ru/map-31 бинарных опционов отзывы олимп трейд бинарные опционы   http://option.inava.ru/map-8 опцион на продажу лучшие стратегии для бинарных опционов   http://option.inava.ru/map-19 валютный опцион бинарные опционы андроид ', 'Y', '178.94.42.169', 1437831666, '2015-07-25 22:41:06'),
(77, 1024, NULL, NULL, '', 'Yanhmix', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'бинарных опционах что это точные сигналы бинарных опционов   http://option.inava.ru/map-22 бот для бинарных опционов трейдинг бинарных опционов   http://option.inava.ru/map-21 опцион википедия прибыльные стратегии по бинарным опционам   http://option.inava.ru/map-7 бездепозитный бонус на бинарных опционах 2015 бинарных опционах что это ', 'Y', '178.94.42.169', 1437832039, '2015-07-25 22:47:19'),
(78, 1024, NULL, NULL, '', 'Yanhmix', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'как заработать на турбо опционах торговля опционами онлайн   http://option.inava.ru/map-29 бинарные опционы стратегии для новичков сколько можно заработать на опционах   http://option.inava.ru/map-0 бинарные опционы сигналы по бинарным опционам   http://option.inava.ru/map-5 прогнозы для бинарных опционов стратегия бинарные опционы ', 'Y', '178.94.42.169', 1437832305, '2015-07-25 22:51:45'),
(79, 1669, NULL, NULL, '', '사신', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '좀지났는데 사과문이라두 올라왔나요?\r\n아지가지 사과안했나 보네\r\n빨리 사과하시지 친일파 넘들\r\n언능 대가리 숙이고 공식적으로 사과하고\r\n복지관 직원들 다 교체해라 \r\n개 쓰레기 같은 것들 ', 'Y', '223.62.219.243', 1438037667, '2015-07-28 07:54:27'),
(80, 1024, NULL, NULL, '', 'Michaelriz', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'D autres l accusent d avoir protГgГ les mГdecins.  http://kevinhearne.com/a-map-fr-accutane | Map fr accutane  Soignants et patients le dГplorent.  http://www.servaturhotels.com/a-map-de-tadalis | a-map-de-tadalis  Les implants ont ГtГ retirГs du marchГ en avril 2010.  http://www.bill613.com/a-map-es-lioresal | Map es lioresal ', 'Y', '79.110.25.155', 1438180591, '2015-07-29 23:36:31'),
(81, 1024, NULL, NULL, '', 'darejofaped87', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Привет! \r\nНа моем сайте - http://kote.ws - Вы не найдете пустой теоретической информации. Все что тут есть - результат работы и ошибок за более чем 10 лет работы в интернете. \r\nЯ не буду говорить что всегда все было гладко, так не бывает. Но на этом сайте я собрал весь свой опыт, который Вы можете перенять, и добиться еще больших успехов.', 'Y', '93.179.68.209', 1438224367, '2015-07-30 11:46:07'),
(82, 1024, NULL, NULL, '', 'Vanhmix', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'grand capital опционы опционы в россии  http://inreginfo.ru/map-18   график опционов торговля опционами демо  http://inreginfo.ru/map-23   биржа опционов хеджирование бинарных опционов  http://www.zomgitsplayable.ru/map-8   операции с опционами олимп трейд бинарные опционы     http://pd-ugra.ru/binarnye-opciony-v-rublyah.html ', 'Y', '79.110.25.225', 1438257342, '2015-07-30 20:55:42'),
(83, 1024, NULL, NULL, '', 'BarbaraDare', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'iq option тактика  http://rabota-uspeh.ru/программы-для-торговли-бинарными-опционами   аналитика бинарных опционов заработать на опционах  http://darjeelingteaxpress.ru/как-работают-бинарные-опционы   рейтинг бинарных опционов  http://wf-cheats.ru/как-правильно-торговать-на-бинарных-опционах   купить опцион     http://dir66.ru/лучшие-стратегии-с-бинарными-опционами    стратегии для опционов     http://bezdepozitny.ru/map-20 ', 'Y', '93.179.89.123', 1438536036, '2015-08-03 02:20:36'),
(84, 1024, NULL, NULL, '', 'BarbaraDare', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Il ne faut pas nous prendre pour des imbeciles.  http://inava.ru Le suspense sera bientot leve.  http://ne24.ru/ La logique serait alors d augmenter les rations.  http://a-meds.com/ La modification est effective depuis le 10avril 2012. ', 'Y', '5.101.217.109', 1438601043, '2015-08-03 20:24:03'),
(85, 1024, NULL, NULL, '', 'BarbaraDare', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Dix-huit mois plus tard pas de regrets.  http://inava.ru Les membres de ma famille ne se soulagent pas ainsi.  http://ne24.ru/ A son arrivee, en 2007, M.  http://a-meds.com/ Le desaccord sera acte dans le texte final. ', 'Y', '46.161.62.90', 1438739703, '2015-08-05 10:55:03'),
(86, 1024, NULL, NULL, '', 'BarbaraDare', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'En 1983, les chercheurs isolaient le VIH.  http://inava.ru L analyse principale ne retrouve pas de sur-risque.  http://ne24.ru/ Le proces doit durer jusqu au 17 mai.  http://a-meds.com/ C est excitant, s enthousiasme-t-il. ', 'Y', '5.8.37.212', 1438769875, '2015-08-05 19:17:55'),
(87, 1024, NULL, NULL, '', 'Michaelriz', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Rien ne filtre de ces trois jours.  http://www.bill613.com/a-map-en-celebrex | Map en celebrex  J essaie de faire ce qu il faut pour sauver des vies.  http://www.connect.org/a-map-en-coumadin | en coumadin  La maman Гtait enceinte de sept mois.  http://www.bill613.com/a-map-en-effexor | Map en effexor ', 'Y', '46.161.62.101', 1438941010, '2015-08-07 18:50:10'),
(88, 1024, NULL, NULL, '', 'BarbaraDare', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Le week-end, on a envie de se lacher.  http://inava.ru Un rapport devra etre remis en janvier 2013.  http://ne24.ru/ La suite des evenements aussi interroge.  http://a-meds.com/ Le constat n en reste pas moins affligeant. ', 'Y', '93.179.89.10', 1438943137, '2015-08-07 19:25:37'),
(89, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Тем временем Остромир подошел к Есене и протянул ему маленькую аспидную доску с записанной на ней задачей посложней.  http://kraisinform.ru/opcion-cennaya-bumaga.php | опцион ценная бумага http://make-cs.ru/iq-option-analizator-skachat.php | iq option анализатор скачать http://prostoegrul.ru/samyy-luchshiy-broker-binarnyh-opcionov-otzyvy.php | самый лучший брокер бинарных опционов отзывы http://goreview.ru/iq-option-minimalnyy-depozit.php | iq option минимальный депозит http://edu-support.ru/opciony-s-minimalnym-vlozheniem.php | опционы с минимальным вложением ', 'Y', '93.179.89.64', 1439074754, '2015-08-09 07:59:14'),
(90, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Не стало самого младшего Ильвинга, Вульф лишился опытного бойца, брошен вызов его клану.  http://customwritingwebsite.com/opciony-dostupnym-yazykom.php | опционы доступным языком http://edu-support.ru/put-option-fair-value-hedge.php | put option fair value hedge http://radioe1.ru/iq-option-opisanie.php | iq option описание http://buyessaywritingonline.com/kotirovki-opcionov.php | котировки опционов http://worldofsportsnews.ru/opciony-i-ih-vidy.php | опционы и их виды ', 'Y', '93.179.89.9', 1439106411, '2015-08-09 16:46:51'),
(91, 1024, NULL, NULL, '', 'Michaelriz', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'En juin 2012, ils Гtaient 52 %.  http://www.alpstourgolf.com/a-map-en-zithromax | en zithromax  Le Monde.fr publie son texte en intГgralitГ.  http://www.bicigrino.com/a-map-de-diflucan | a-map-de-diflucan  Aujourdв™hui, je nв™ai quasiment plus de migraines.  http://kevinhearne.com/a-map-en-lotemax | Map en lotemax ', 'Y', '146.185.201.28', 1439204739, '2015-08-10 20:05:39'),
(92, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Казеин, благодаря которому сандарак когда-то пристал к ткани, давно засох и превратился в пыль.  http://hotaudiobook.ru/kol-opcion.php | кол опцион http://odin-dollar.ru/binarnye-opciony-stati.php | бинарные опционы статьи http://e-est.ru/opcionempleo.php | opcionempleo http://free-programm.ru/binarnye-opciony-alpari-otzyvy.php | бинарные опционы альпари отзывы http://bontalon.ru/kak-zarabotat-na-iq-option.php | как заработать на iq option ', 'Y', '46.161.62.92', 1439226279, '2015-08-11 02:04:39'),
(93, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Он щелчком забросил в окно монету в десять серебряных и прошел мимо, проигнорировав растерянное: - Спасибо, добрый господин.  http://buyessaywritingonline.com/metod-goncharova-binarnye-opciony.php | метод гончарова бинарные опционы http://eholotshop.ru/9-11-put-option.php | 9 11 put option http://argument-gifts.ru/torgovlya-ot-opcionnyh-urovney.php | торговля от опционных уровней http://buyessaywritingonline.com/iq-option-vk.php | iq option вк http://free-programm.ru/opcion-koll.php | опцион колл ', 'Y', '178.94.32.111', 1439262623, '2015-08-11 12:10:23'),
(94, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'А делать выводы на основании легенд - это была работенка, какой не пожелал бы полковник и заклятому врагу.  http://kraisinform.ru/opcion-na-pokupku-akciy.php | опцион на покупку акций http://radiosky.ru/besplatnye-signaly-dlya-binarnyh-opcionov.php | бесплатные сигналы для бинарных опционов http://buyessaywritingonline.com/trendovye-indikatory-dlya-binarnyh-opcionov.php | трендовые индикаторы для бинарных опционов http://worldofsportsnews.ru/kak-pokupat-opciony.php | как покупать опционы http://kraisinform.ru/option-com.php | option com ', 'Y', '178.94.32.111', 1439264013, '2015-08-11 12:33:33'),
(95, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Сталин рассуждал так: &quot;Первая мировая война вырвала одну страну из капиталистического рабства.  http://make-cs.ru/60-sekund-strategii-torgovli-opcionu.php | 60 секунд стратегии торговли опциону http://edu-support.ru/strategiya-martingeyla-na-binarnyh-opcionah.php | стратегия мартингейла на бинарных опционах http://edu-support.ru/shkola-binarnyh-opcionov.php | школа бинарных опционов http://bontalon.ru/video-indikatora-opciony.php | видео индикатора опционы http://free-programm.ru/binarnye-opciony-otkryt-schet.php | бинарные опционы открыть счет ', 'Y', '5.101.217.60', 1439265227, '2015-08-11 12:53:47'),
(96, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'И отхлебнув, сколько хватает дыхания, заставляет отпить Дениса, а затем до дна - Антона.  http://goreview.ru/sergey-mironov-opciony-otzyvy.php | сергей миронов опционы отзывы http://bontalon.ru/call-option-trading.php | call option trading http://radioe1.ru/grafiki-opcionov-v-realnom-vremeni.php | графики опционов в реальном времени http://radioe1.ru/iq-option-2015-vyvod-deneg.php | iq option 2015 вывод денег http://oao-vkz.ru/treyder-binarnye-opciony.php | трейдер бинарные опционы ', 'Y', '93.179.89.87', 1439271754, '2015-08-11 14:42:34'),
(97, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Но разумное &quot;нет&quot; означало &quot;нет&quot; всему ценному - истине и смыслу, и тем самым тоже было безумно.  http://goreview.ru/kak-zarabotat-na-iq-option.php | как заработать на iq option http://iwomentop.ru/binarnye-opciony-minimalnaya-stavka.php | бинарные опционы минимальная ставка http://iwomentop.ru/finansovye-opciony-spravochnik-putevoditel.php | финансовые опционы справочник путеводитель http://worldofsportsnews.ru/indikator-torgovyh-signalov.php | индикатор торговых сигналов http://make-cs.ru/novosti-opcionov.php | новости опционов ', 'Y', '146.185.201.101', 1439273203, '2015-08-11 15:06:43'),
(98, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Жена губернатора, стоявшая рядом с миссис Модести, улыбалась и кивала, указывая веером на площадку для танцев.  http://pierre1.ru/binarnye-opciony-prakticheskoe-rukovodstvo.php | бинарные опционы практическое руководство http://comp4k.ru/dosrochnoe-zakrytie-opciona.php | досрочное закрытие опциона http://free-programm.ru/zarabotok-na-binarnyh-opcionah-realno.php | заработок на бинарных опционах реально http://argument-gifts.ru/kak-torgovat-na-turbo-opcionah.php | как торговать на турбо опционах http://argument-gifts.ru/call-option-formula.php | call option formula ', 'Y', '93.179.89.125', 1439274780, '2015-08-11 15:33:00'),
(99, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Он крепко держал ее, не хотел отпускать - несмотря на боль, страх, смущение, - Тесса понимала это.  http://customwritingwebsite.com/roman-stroganov-binarnye-opciony.php | роман строганов бинарные опционы http://pierre1.ru/doveritelnoe-upravlenie-opciony.php | доверительное управление опционы http://msi-vystavki.ru/put-option-youtube.php | put option youtube http://eholotshop.ru/first-binary-option-service-voyti.php | first binary option service войти http://sov-dance.ru/opcion-na-fuchers-rts.php | опцион на фьючерс ртс ', 'Y', '93.179.89.22', 1439276294, '2015-08-11 15:58:14'),
(100, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'И там, где должно было раздаться слово апостольское, дело решила шальная офицерская пуля.  http://edu-support.ru/opcion-instaforex.php | опцион instaforex http://e-est.ru/io-option-binarnye-opciony.php | io option бинарные опционы http://comp4k.ru/iq-option-v-rublyah.php | iq option в рублях http://comp4k.ru/brokery-binarnye-opciony.php | брокеры бинарные опционы http://free-programm.ru/binarnye-opciony-i-foreks.php | бинарные опционы и форекс ', 'Y', '5.8.37.239', 1439277801, '2015-08-11 16:23:21'),
(101, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Но когда я пошла дальше, все выше поднимались стены домов телестре, и единственным, что я еще могла видеть, были звезды.  http://oao-vkz.ru/binarnye-opciony-lohotron.php | бинарные опционы лохотрон http://bontalon.ru/binarnye-opciony-zakrytie.php | бинарные опционы закрытие http://free-programm.ru/investirovanie-opciony.php | инвестирование опционы http://pierre1.ru/brokery-binarnyh-opcionov-s-bezdepozitnym-bonusom.php | брокеры бинарных опционов с бездепозитным бонусом http://kraisinform.ru/investirovanie-v-opciony.php | инвестирование в опционы ', 'Y', '91.239.24.4', 1439279297, '2015-08-11 16:48:17'),
(102, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Недаром карлики пользовались дурной славой даже в Мидгарте, где их не особенно часто можно встретить.  http://free-programm.ru/call-option-dividend-formula.php | call option dividend formula http://make-cs.ru/binarnye-opciony-strategii-na-15-minut.php | бинарные опционы стратегии на 15 минут http://free-programm.ru/torgovlya-opcionami-v-izraile.php | торговля опционами в израиле http://comp4k.ru/opcion-vne-deneg.php | опцион вне денег http://iwomentop.ru/rabota-v-internete-binarnye-opciony.php | работа в интернете бинарные опционы ', 'Y', '146.185.200.117', 1439280894, '2015-08-11 17:14:54'),
(103, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Пленных херулийцев связали по рукам и ногам и посадили на одну из телег, которые отправлялись с отрядом.  http://msi-vystavki.ru/opciony-obuchenie-video.php | опционы обучение видео http://prostoegrul.ru/call-option-zero-volatility.php | call option zero volatility http://comp4k.ru/binary-options.php | binary options http://eholotshop.ru/put-option-exercise-price.php | put option exercise price http://argument-gifts.ru/kak-obmanut-binarnye-opciony.php | как обмануть бинарные опционы ', 'Y', '5.101.222.51', 1439282480, '2015-08-11 17:41:20'),
(104, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Она представила, как его широкая ладонь гладит ее по щеке и по волосам, и ей стало приятно.  http://oao-vkz.ru/ooo-opcion-m-lipeck.php | ооо опцион м липецк http://worldofsportsnews.ru/ios-7-reject-call-option.php | ios 7 reject call option http://radioe1.ru/smotret-binarnye-opciony.php | смотреть бинарные опционы http://oao-vkz.ru/mironov-opciony.php | миронов опционы http://pierre1.ru/binarnye-opciony-bonus.php | бинарные опционы бонус ', 'Y', '46.161.62.110', 1439310014, '2015-08-12 01:20:14'),
(105, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'С потребительской корзиной у наших гоблинов все в порядке, хлеба хватает, а без зрелищ они обходятся.  http://bontalon.ru/signaly-torgovyh-sistem.php | сигналы торговых систем http://buyessaywritingonline.com/forum-binarnye-opciony-indikatory.php | форум бинарные опционы индикаторы http://iwomentop.ru/torgovye-sistemy-torgovli-binarnymi-opcionami.php | торговые системы торговли бинарными опционами http://bontalon.ru/oshibka-pokupki-opciona.php | ошибка покупки опциона http://argument-gifts.ru/vega-opciona.php | вега опциона ', 'Y', '79.110.25.197', 1439324130, '2015-08-12 05:15:30'),
(106, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Нормальная комната, побогаче, чем у них дома, но с гостиной доктора Добронрава сравнить нельзя.  http://make-cs.ru/kak-rabotat-na-opcionah.php | как работать на опционах http://eholotshop.ru/robot-binarnyh-opcionov.php | робот бинарных опционов http://edu-support.ru/opciony-eur-usd.php | опционы eur usd http://bontalon.ru/torgovlya-na-binarnyh-opcionah.php | торговля на бинарных опционах http://prostoegrul.ru/binarnye-opciony-demura.php | бинарные опционы демура ', 'Y', '5.101.222.20', 1439594459, '2015-08-15 08:20:59'),
(107, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Как шкурка, из которой вынули плоть и душу - шейте шапку, воротник, только чтоб не было слишком больно...  http://hotaudiobook.ru/iq-option-mmgp.php | iq option mmgp http://bontalon.ru/put-option-100-shares.php | put option 100 shares http://argument-gifts.ru/alpari-binarnye-opciony.php | альпари бинарные опционы http://argument-gifts.ru/raschet-opcionnyh-urovney.php | расчет опционных уровней http://oao-vkz.ru/kto-nibud-zarabotal-na-binarnyh-opcionah.php | кто нибудь заработал на бинарных опционах ', 'Y', '46.161.63.48', 1439737174, '2015-08-16 23:59:34'),
(108, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Но, честное слово, три дня прошло, а мне уже кажется, что мозги у меня начали обрастать мхом и плесенью.  http://fontanotshop.com/downloader/skin/install/download/map-43.html И эльф совершенно не обратил внимания на то, как облегченно вздохнул и расслабился гоббер.  http://memoiretraumatique.org/map-8.html Так пахнет соль, - Полоз подобрал из-под ног извивистый сук и прижал его к носу, - вот, он пахнет морем. Элвин не хотел, чтобы Артур залезал в лодку в своем нынешнем обличье и оставлял там следы.  http://fontanotshop.com/downloader/skin/install/download/map-29.html http://fontanotshop.com/downloader/skin/install/download/map-4.html ', 'Y', '79.110.25.154', 1439756590, '2015-08-17 05:23:10'),
(109, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Когда я начинаю смеяться в бою, когда кровь застилает глаза, когда все живое вызывает лишь желание убивать...  http://eholotshop.ru/kak-torgovat-opcionami-v-quik.php | как торговать опционами в quik http://odin-dollar.ru/binarnye-opciony-demura.php | бинарные опционы демура http://free-programm.ru/binarnye-opciony-reyting.php | бинарные опционы рейтинг http://edu-support.ru/call-option-rho-positive.php | call option rho positive http://pierre1.ru/zarabotok-na-binarnyh-opcionah.php | заработок на бинарных опционах ', 'Y', '146.185.200.18', 1439817697, '2015-08-17 22:21:37'),
(110, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'И потом, положив его назад в люльку, я уже знал, что никогда больше не смогу пронести его по лестнице.  http://iwomentop.ru/fuchersnye-opciony.php | фьючерсные опционы http://radioe1.ru/iq-option-vyvod-sredstv.php | iq option вывод средств http://pierre1.ru/luchshie-binarnye-opciony-otzyvy.php | лучшие бинарные опционы отзывы http://radiosky.ru/analiz-opcionnyh-urovney.php | анализ опционных уровней http://radioe1.ru/binarnye-opciony-kak-zarabotat.php | бинарные опционы как заработать ', 'Y', '5.101.222.20', 1439851045, '2015-08-18 07:37:25'),
(111, 1716, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '축하합니다!!~ ', 'Y', '220.120.208.124', 1439884460, '2015-08-18 16:54:20'),
(112, 1716, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '여튼 최우수상 추카 ^^; 동참합니다.', 'Y', '211.195.158.37', 1439945790, '2015-08-19 09:56:30'),
(113, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Точно краб, примостился он среди скал и приливно-отливных озер: темный, укрытый от посторонних глаз, хорошо защищенный.  http://foto-antoniy.ru/it/opzioni-binarie-60-secondi-1 | Opzioni binarie 60 secondi 1 http://drive31.ru/de/www-bdswiss-vom | Www bdswiss vom http://bitvion.ru/it/trader-online | Trader online http://styleindetails.ru/it/segnali-trading-opzioni-binarie-gratis | Segnali trading opzioni binarie gratis http://hotline-kuzbass.ru/it/opzioni-binarie-investimenti | Opzioni binarie investimenti ', 'Y', '46.161.62.60', 1440102766, '2015-08-21 05:32:46'),
(114, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'В нескольких сотнях метров от нас на берегу лежала еще одна лодка, покинутая хозяевами и предоставленная воле волн.  http://foto-antoniy.ru/it/qoption-binary | Qoption binary http://new-academy.ru/it/opzioni-binarie-fare-pratica-con-conto-gratuito | Opzioni binarie fare pratica con conto gratuito http://salambula.ru/de/binare-optionen-trader-kopieren | Binare optionen trader kopieren http://new-academy.ru/it/auto-opzione-binarie-recensioni | Auto opzione binarie recensioni http://bitvion.ru/de/binare-optionen-ohne-mindesteinzahlung | Binare optionen ohne mindesteinzahlung ', 'Y', '46.161.63.64', 1440140226, '2015-08-21 15:57:06'),
(115, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Сетин наблюдала за ней через небольшой столик, а у окна сидела молодая женщина и кормила грудью ребенка.  http://salambula.ru/de/binare-optionen-metatrader-broker | Binare optionen metatrader broker http://bi-context.ru/it/pokemon-trading-card-games-online | Pokemon trading card games online http://hotline-kuzbass.ru/it/trade-option | Trade option http://salambula.ru/it/pro-binary-option | Pro binary option http://hotline-kuzbass.ru/it/operazione-binaria-trading | Operazione binaria trading ', 'Y', '5.101.222.93', 1440241379, '2015-08-22 20:02:59'),
(116, 1024, NULL, NULL, '', 'RonaldMt', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'J Гtais dans une spirale.  http://www.zuccari.com/a-map-1  Comme Eric, 54 ans, adressГ par un pneumologue.  http://www.grecianbay.com/a-map-8  On n aime pas en parler.  http://www.secforestales.org/a-map-1  \r\nSon seul souci : elle a grossi de 6 kg.\r\nUn geste simple, mais pas systГmatique.\r\nC est un projet colossal.\r\nMais lГ, ma colГЁre a ГclatГ.\r\nJ ai pris pas mal de poids, c est vrai.\r\n', 'Y', '5.101.222.73', 1440250971, '2015-08-22 22:42:51'),
(117, 1024, NULL, NULL, '', 'RonaldMt', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Ce n est pas de savoir si c est de l euthanasie ou non.  http://www.zuccari.com/a-map-10  Difficile de faire parler les conseillers.  http://www.servaturhotels.com/a-map-10  Ils n arrivent pas Г dire non, alors ils payent.  http://www.secforestales.org/a-map-11  \r\nEt leurs questions restent toujours sans rГponse.\r\nSans compter quatorze recommandations.\r\nDe quand date ce clivage ? De l aprГЁs-Mai 68.\r\nSon auteure : Felicitas Roher.\r\nChercheur prestigieux, M.\r\n', 'Y', '46.161.63.61', 1440560762, '2015-08-26 12:46:02'),
(118, 1024, NULL, NULL, '', 'RonaldMt', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Le pГЁre d une copine l a transportГe Г l hГpital.  http://www.servaturhotels.com/a-map-0  La France, elle, tarde.  http://www.servaturhotels.com/a-map-2  TГV annonГ§ait toujours ses visites.  http://www.pridenw.org/a-map-12  \r\nC Гtait une lycГenne de 17 ans.\r\nCertes, il n est de coutume de communiquer sur une AMM.\r\nDepuis, chacun dГfend ses intГrГts bec et ongles.\r\nL Alsace a obtenu trois contrats pour 2013.\r\nSeule une alliance peut les rГsoudre.\r\n', 'Y', '46.161.62.24', 1440863783, '2015-08-30 00:56:23'),
(119, 1024, NULL, NULL, '', 'Michaelriz', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Depuis, chacun dГfend ses intГrГts bec et ongles.  http://www.grecianbay.com/a-map-7  Ce n est pas Г l ordre du jour.  http://www.servaturhotels.com/a-map-10  Des propos restГs pour l instant sans lendemain.  http://www.pridenw.org/a-map-5 ', 'Y', '79.110.25.226', 1441106718, '2015-09-01 20:25:18'),
(120, 1718, NULL, NULL, '', '운영자', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '어르신소리함 게시판 성격과 맞지않아 글을 이동하였습니다. 양해부탁드립니다.', 'Y', '211.201.249.11', 1441260946, '2015-09-03 15:15:46'),
(121, 1717, NULL, NULL, '', '운영자', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '어르신소리함 게시판 성격과 맞지않아 글을 이동하였습니다. 양해부탁드립니다.', 'Y', '211.201.249.11', 1441260956, '2015-09-03 15:15:56'),
(122, 1716, NULL, NULL, '', '운영자', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '어르신소리함 게시판 성격과 맞지않아 글을 이동하였습니다. 양해부탁드립니다.', 'Y', '211.201.249.11', 1441260969, '2015-09-03 15:16:09'),
(123, 1664, NULL, NULL, '', '운영자', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '어르신소리함 게시판 성격과 맞지않아 글을 이동하였습니다. 양해부탁드립니다.', 'Y', '211.201.249.11', 1441261009, '2015-09-03 15:16:49'),
(124, 1024, NULL, NULL, '', 'Michaelriz', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Le jeune homme s en va, impassible.  http://kathycaprino.com/a-map-8  IncinГrer un cheval coГte de l argent.  http://kathycaprino.com/a-map-en-valtrex  Une affirmation qui fait bondir les concernГs.  http://www.chemtex.com/a-map-en-paxil ', 'Y', '46.161.62.64', 1441553500, '2015-09-07 00:31:40'),
(125, 1024, NULL, NULL, '', 'Michaelriz', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Pour autant, pas d enthousiasme excessif.  http://www.chemtex.com/a-map-de-celebrex  Je me sens comme un soldat du feu , lance M.Debuiche.  http://kathycaprino.com/a-map-en-priligy  A cet Гge, l amende ne serait pas satisfaisante.  http://mkuniversity.org/a-map-en-aldara ', 'Y', '146.185.201.40', 1441641229, '2015-09-08 00:53:49'),
(126, 1024, NULL, NULL, '', 'Benitomet', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Спроси любого из присутствующих - каждый скажет, что ему в гневе случалось совершать поступки, в которых он потом раскаивался.  http://7fabrika.ru/map-90 | Map-90   Вульф пошел с ним, чтобы пожелать счастливого пути своим витязям и сказать, что он постарается присоединиться к ним к началу сражения.  http://electrolux-tomsk.ru/map-25 | Map-25   http://twolions.ru/map-4 | Map-4     http://yandexxx.ru/map-99 | Map-99 ', 'Y', '178.94.85.154', 1441933071, '2015-09-11 09:57:51'),
(127, 1024, NULL, NULL, '', 'Benitomet', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Она провела малышку Пэгги в спальню за кухней, где они с Папой спали, когда принимали гостей.  http://electrolux-tomsk.ru/map-99 | Map-99   Она по опыту знала, что чем быстрее и дольше едет, тем меньше беспокоит ее этот ненавистный звук.  http://yandexxx.ru/map-5 | Map-5   http://trim-stroy.ru/map-54 | Map-54     http://twolions.ru/map-101 | Map-101 ', 'Y', '178.94.99.18', 1442015671, '2015-09-12 08:54:31'),
(128, 1024, NULL, NULL, '', 'Michaelriz', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'L accueil est tout sauf accessoire.  http://www.usacanadaregion.org/a-map-es-zithromax | Map es zithromax  Mais ce n est pas spГcifique Г la profession mГdicale.  http://mobilemoneyafrica.com/a-map-es-zithromax | Map es zithromax  C est lГ-dessus qu il faut travailler.  http://mobilemoneyafrica.com/a-map-nb-kamagra | Map nb kamagra ', 'Y', '5.8.37.225', 1442111645, '2015-09-13 11:34:05'),
(129, 1024, NULL, NULL, '', 'Michaelriz', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Les avocats comme leurs clients Гtaient atterrГs.  http://ibray.pl/brvihg/cerita-dewasa-ngesek-ama-neneku.html  Histoire d un amour, Гd.  http://mos2014.ru/bol-she-60-muzeev-v-den-goroda-budut-rabotat-besplatno/?room/gullet.htmlJ%18View%201+%20similar%20products  Tout d un coup, il Гtait mort.  http://rawbeets.com/?list10=5576 http://dko.su/ggk5o3auq/www.kannada-tullu-tunne-kathe.in.php ', 'Y', '5.101.217.113', 1442899322, '2015-09-22 14:22:02'),
(130, 1847, NULL, NULL, '', '리홍균 Thomas.', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '1부를 보시고 나머지 부분은 저의 집을 방문해 주새요 대문이 열렸습니다\r\n고맙습니다', 'Y', '211.37.30.101', 1449991212, '2015-12-13 16:20:12'),
(132, 1980, NULL, NULL, 'ROOT', '관리자', '관리자', '*5767B619D29D3B5B9C12C42F52E0DEEEC3B3C839', '고객평가단으로 위촉되신 것을 진심으로 축하드립니다!!', 'Y', '112.220.69.146', 1459296520, '2016-03-30 09:08:40'),
(134, 1881, NULL, NULL, 'ROOT', '관리자', '관리자', '*5767B619D29D3B5B9C12C42F52E0DEEEC3B3C839', '함께 마음을 나누는 어르신들의 따뜻한 정성이 모여 어려운 이웃에게 전달되었습니다. 감사합니다!!! ^^', 'Y', '112.220.69.146', 1459296677, '2016-03-30 09:11:17'),
(135, 5847, NULL, NULL, '', '관리자', '', '*BFF28043C75232B1DF8A7CFE678082B812FFA595', '안녕하세요 구로노인종합복지관 입니다 ^^\r\n먼저 저희 복지관 프로그램에 관심 가져주셔서 감사합니다.\r\n말씀하신 실버가요제는 현재 관련 사진자료를 가지고 있으며 동영상 다시보기는 불가능함을 안내해드립니다. 양해부탁드리며, 사진자료 열람을 희망하시는 경우에는 내방을 부탁드리겠습니다.\r\n감사합니다 ^^', 'Y', '112.220.69.146', 1499387233, '2017-07-07 09:27:13'),
(136, 3159, NULL, NULL, 'ROOT', '관리자', '관리자', '*5767B619D29D3B5B9C12C42F52E0DEEEC3B3C839', '안녕하세요 구로노인종합복지관 입니다.\r\n먼저 복지관 시설로 인해 불편함을 드려서 대단히 죄송합니다.\r\n말씀하신 환풍기는 3월 16일 날짜로 모터를 교체하여 소음발생을 최소화 할 수 있도록 조치하였습니다.\r\n양해의 말씀 전해드리며, 앞으로도 저희 복지관은 지역주민들과 함께 상생하는 기관으로 거듭날 수 있도록 노력하겠습니다. 감사합니다.', 'Y', '112.220.69.146', 1499388555, '2017-07-07 09:49:15');

-- --------------------------------------------------------

--
-- 테이블 구조 `wk_bbs_free`
--

CREATE TABLE `wk_bbs_free` (
  `idx` int(11) NOT NULL,
  `category` varchar(10) DEFAULT NULL COMMENT '카테고리',
  `indexNo` varchar(50) DEFAULT NULL COMMENT '고유아이디',
  `user_id` varchar(20) DEFAULT NULL COMMENT '아이디',
  `user_name` varchar(20) DEFAULT NULL COMMENT '이름',
  `user_level` int(11) DEFAULT NULL COMMENT '레벨',
  `nickName` varchar(30) DEFAULT NULL COMMENT '닉네임',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `pwd` varchar(255) DEFAULT NULL COMMENT '비밀번호',
  `headtext` varchar(255) DEFAULT NULL COMMENT '말머리',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `html` enum('Y','N') DEFAULT NULL COMMENT 'Html 사용여부',
  `content` text COMMENT '내용',
  `linkUrl` text COMMENT '링크경로',
  `movie` text COMMENT '동영상경로',
  `hit` int(11) DEFAULT '0' COMMENT '조회수',
  `recom` int(11) DEFAULT '0' COMMENT '추천수',
  `recom_id` text COMMENT '추천아이디',
  `notice` enum('Y','N') DEFAULT 'N' COMMENT '공지글여부',
  `secret` enum('Y','N') DEFAULT 'N' COMMENT '비빌글여부',
  `view_ck` enum('Y','N') DEFAULT 'Y' COMMENT '노출여부',
  `fileName` text COMMENT '첨부파일 실제이름',
  `files` text COMMENT '첨부파일 변환이름',
  `files_comment` text COMMENT '파일설명',
  `fno` int(11) DEFAULT NULL COMMENT '글번호',
  `thread` varchar(255) DEFAULT NULL COMMENT '답변글번호',
  `user_ip` varchar(30) DEFAULT NULL COMMENT '아이피',
  `reg_date` int(11) DEFAULT NULL COMMENT '등록일',
  `date_tm` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '등록일',
  `pg_gb` varchar(10) DEFAULT NULL COMMENT '기기구분',
  `tb_gubun` varchar(40) DEFAULT NULL COMMENT '게시판구분',
  `sort_num` int(11) DEFAULT '0' COMMENT '순서'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='자유게시판';

-- --------------------------------------------------------

--
-- 테이블 구조 `wk_bbs_free_comment`
--

CREATE TABLE `wk_bbs_free_comment` (
  `idx` int(11) NOT NULL,
  `Bidx` int(11) DEFAULT NULL COMMENT '게시판인덱스값',
  `indexNo` varchar(50) DEFAULT NULL COMMENT '고유아이디',
  `fb_tw_do` varchar(10) DEFAULT NULL COMMENT 'sns선택',
  `user_id` varchar(20) DEFAULT NULL COMMENT '아이디',
  `user_name` varchar(20) DEFAULT NULL COMMENT '이름',
  `nickName` varchar(30) DEFAULT NULL COMMENT '닉네임',
  `pwd` varchar(255) DEFAULT NULL COMMENT '비밀번호',
  `content` text COMMENT '내용',
  `view_ck` enum('Y','N') DEFAULT 'Y' COMMENT '노출여부',
  `user_ip` varchar(30) DEFAULT NULL COMMENT '아이피',
  `reg_date` int(11) DEFAULT NULL COMMENT '등록일',
  `date_tm` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '등록일'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='자유게시판';

--
-- 테이블의 덤프 데이터 `wk_bbs_free_comment`
--

INSERT INTO `wk_bbs_free_comment` (`idx`, `Bidx`, `indexNo`, `fb_tw_do`, `user_id`, `user_name`, `nickName`, `pwd`, `content`, `view_ck`, `user_ip`, `reg_date`, `date_tm`) VALUES
(1, 16, NULL, NULL, '', '노래강사', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '월암 선생님 우리 구로 노인복지관 산악회 발족에 축하 말씀과 산행에 도움이 되는 좋은 말씀 잘읽어습니다 감사합니다  노래강사 이수철 올림', 'Y', '210.121.218.233', 1111060936, '2005-03-17 21:02:16'),
(2, 5, NULL, NULL, '', '노래강사', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '요즘 제가 빠쁜일로 인텃을 검색할 시간이 없어습니다  오늘잠시 2층 컴퓨터 방에 들려 인터넷을 검색하다 구로 노인 복지관 홈피가 새롭게 개설된것을 보았습니다 총반장님 께서 등산 안내글을 보고  우리 구로노인복지관 등산 동우리 회가 하루 빨리 활성화되기를 기대하면서 꼬리글을 올 립니다 노래강사 이수철 올림', 'Y', '210.121.218.233', 1111061762, '2005-03-17 21:16:02'),
(3, 13, NULL, NULL, '', '노래강사', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '저는 구로노인복지관 노래강사 이수철 입니다 멀리 부산에서\r\n저의 홈피 축하글 을 올려 주셔서 고맙습니다', 'Y', '210.121.218.233', 1111196104, '2005-03-19 10:35:04'),
(4, 12, NULL, NULL, '', '노래강사', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '구로노인 홈피 운영자님 감사 합니다\r\n항상 초심을 잃치 않고 봉사 하겠다는 마음 고맙습니다\r\n\r\n실버밴드 악단장 이수철', 'Y', '210.121.218.233', 1111196383, '2005-03-19 10:39:43'),
(5, 8, NULL, NULL, '', '노래강사', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '새로운 시작은 항상 신선한 것이지요 좋은 동영상 글 잘읽 었습니다\r\n\r\n노래강사 이수철 올림', 'Y', '210.121.218.233', 1111197025, '2005-03-19 10:50:25'),
(6, 4, NULL, NULL, '', '노래강사', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '차상희 선생 오랬 만입니다 다른 복지관 으로 전근 되여도 구로 노인 복지관을 잊지 않고 \r\n축하 메세지 까지 올려 주니 감사합니다 \r\n노래강사 이수철', 'Y', '210.121.218.233', 1111197337, '2005-03-19 10:55:37'),
(7, 24, NULL, NULL, '', '노래강사', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '위에쓴 글 내용중 누리꾼 이란 단어는 사이버 이용자 네티진등 을 통틀어 지칭 하는 순수한 우리말 신조어 입니다', 'Y', '210.121.218.233', 1111201564, '2005-03-19 12:06:04'),
(8, 24, NULL, NULL, '', '소향', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '노래강사 님 올리신글 동감 입니다 저는 구로 노인 복지관 회원이며 컴퓨터 배우고 있는 왕초보입니다 우연히 다음 카페 수선화 둥지 회원에 가입하여 처음으로 자유 게시판에 글을 올렸는데 의로로 운영자 이신  수선화 님 과 한나님 별나라님 이 좋은 글을 올렸다고 꼬리말을 달아 주어\r\n고마 웠습니다\r\n', 'Y', '210.121.218.233', 1111206520, '2005-03-19 13:28:40'),
(9, 24, NULL, NULL, '', '이화', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '선생님글 잘일겄읍니다.지당한 말씀입니다.\r\n설리 홍조라는 뜻도 알게되였읍니다.감사합니다', 'Y', '211.201.234.183', 1111212174, '2005-03-19 15:02:54'),
(10, 26, NULL, NULL, '', '노래강사', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '봄내음이 물씬 풍기는 동영상과 소중한 오늘 하루 시한편 잘읽고 갑니다', 'Y', '210.121.218.233', 1111218165, '2005-03-19 16:42:45'),
(11, 24, NULL, NULL, '', '노래강사', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '이화님의 꼬리글 감사 합니다 더욱더 좋은 글많이 올려주십시요', 'Y', '210.121.218.233', 1111218506, '2005-03-19 16:48:26'),
(12, 20, NULL, NULL, '', '지화', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '축하말씀 감사합니다..^^', 'Y', '61.34.212.6', 1111735200, '2005-03-25 16:20:00'),
(13, 63, NULL, NULL, '', '황창현', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'ㅏ', 'Y', '220.65.71.5', 1112934420, '2005-04-08 13:27:00'),
(14, 63, NULL, NULL, '', '황창현', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '이거 저꺼에염 저 몰르고 이름을 못&amp;#50043;어염 ㅈㅅ해염 이름 몰라 보개해서염', 'Y', '220.65.71.5', 1112934526, '2005-04-08 13:28:46'),
(15, 63, NULL, NULL, '', '황창현', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '이거왜이러지 이름을 못 뭐뭐뭐 &amp;#50043;는데 이상하케 나온다\r\n', 'Y', '220.65.71.5', 1112934582, '2005-04-08 13:29:42'),
(16, 66, NULL, NULL, '', '±이뽀˝나라┼', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '옥상이 그렇게 가고싶어?', 'Y', '220.65.71.5', 1112935086, '2005-04-08 13:38:06'),
(17, 75, NULL, NULL, '', '∑ㅅrㄹ5냔', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '이모디콘 어디있니?\r\n', 'Y', '220.65.71.5', 1112935202, '2005-04-08 13:40:02'),
(18, 29, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '.....\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Y', '220.65.71.5', 1112935273, '2005-04-08 13:41:13'),
(19, 79, NULL, NULL, '', '@(≡∇≡)@', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '하은아! 잘썼다.', 'Y', '220.65.71.5', 1112935334, '2005-04-08 13:42:14'),
(20, 79, NULL, NULL, '', '☆♡아라하은♡☆', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '역시..\r\n내글은 너무 감ㄷ동적일정도로 너무잘써!\r\n내가나에게감동먹었어!', 'Y', '220.65.71.5', 1112935344, '2005-04-08 13:42:24'),
(21, 62, NULL, NULL, '', '하은', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '와!\r\n브라보!\r\n감동!!감동!!', 'Y', '220.65.71.5', 1112935424, '2005-04-08 13:43:44'),
(22, 63, NULL, NULL, '', '이게뭐냐!이게. 장난', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '좋아?행복해?사랑해??', 'Y', '220.65.71.5', 1112935498, '2005-04-08 13:44:58'),
(23, 86, NULL, NULL, '', '전호영', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', ' 지수야,너 왠일로 할머니,할아버지들께 건강하시라고 하니?\r\n 보통때면 쯧쯧..\r\n    ㅋㅋ(밑을 좀 더 봐~)\r\n\r\n\r\n지수야~장난이야.짝!짝! 뽕이얌~', 'Y', '220.65.71.5', 1112935542, '2005-04-08 13:45:42'),
(24, 80, NULL, NULL, '', '킥킥 첫글짜느유용', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '하이 찬우 언제 놀수있냐??\r\n', 'Y', '220.65.71.5', 1112935543, '2005-04-08 13:45:43'),
(25, 78, NULL, NULL, '', 'ㅗㅗㅜㅜ', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '준협은 ㅗ ㅗ ㅜ ㅜ 임.', 'Y', '220.65.71.5', 1112935562, '2005-04-08 13:46:02'),
(26, 73, NULL, NULL, '', '‘부⊆zㅓ운낭´', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '잘 했네~', 'Y', '220.65.71.5', 1112935594, '2005-04-08 13:46:34'),
(27, 66, NULL, NULL, '', 'ㅎ ㅓ ㄹ', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '헐~이상..', 'Y', '220.65.71.5', 1112935603, '2005-04-08 13:46:43'),
(28, 79, NULL, NULL, '', '유용재', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '아라냐? 하은이냥??', 'Y', '218.50.120.13', 1113564360, '2005-04-15 20:26:00'),
(29, 74, NULL, NULL, '', '나', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '으으으 냐냐냐냐냐냐냐냐냐냐냐냐냐', 'Y', '218.50.120.13', 1113564452, '2005-04-15 20:27:32'),
(30, 74, NULL, NULL, '', '나', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '왜 캐 없냐??????', 'Y', '218.50.120.13', 1113564491, '2005-04-15 20:28:11'),
(31, 89, NULL, NULL, '', '딸기', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요\r\n저.....은정이에요', 'Y', '61.75.39.186', 1113978388, '2005-04-20 15:26:28'),
(32, 105, NULL, NULL, '', '딸기', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요.\r\n', 'Y', '61.75.39.186', 1113978600, '2005-04-20 15:30:00'),
(33, 40, NULL, NULL, '', '딸기', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '뭐라고쓴지뭐르겠다.', 'Y', '61.75.39.186', 1113978762, '2005-04-20 15:32:42'),
(34, 111, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요?\r\n저희 복지관의 전산정보학과를 이용하시고 싶으시다고요?\r\n먼저 구로노인종합복지관에 회원가입이 되어 있는지 확인하시고요.\r\n회원가입시 구비서류는 주민등록증, 사진2매입니다.\r\n다음번 전산정보학과 프로그램 접수는 8월중에 있을 예정이며 요청하시는데로 저희 복지관 홈페이지에 공고하도록 하겠습니다.\r\n감사합니다.', 'Y', '61.34.212.6', 1115616380, '2005-05-09 14:26:20'),
(35, 62, NULL, NULL, '', '딸기', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '와!\r\n아라!\r\n짱!이야!', 'Y', '61.75.39.186', 1120120468, '2005-06-30 17:34:28'),
(36, 89, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '나는 오늘 선생님과 구로노인복지관에서. 많은것을 알았다.그런데 안내 하는선생님이름이§김은숙이었다. 이름이참 예쁘다. 나도그런 예쁜이름을 같고싶었다.그리고 올때 뒷문으로나갔다. 난 너무♬ 궁금해서 물어봤느데 주차장 도보고 간다고 뒷문으로나온거다.☞☞☞☞☞☞☞☞ ', 'Y', '61.75.39.186', 1120120531, '2005-06-30 17:35:31'),
(37, 82, NULL, NULL, '', '딸기', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '♬ㅋㅋㅋ \r\n...', 'Y', '61.75.39.186', 1120120646, '2005-06-30 17:37:26'),
(38, 177, NULL, NULL, '', '고언자', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '홈피 운영자께 한 말씀 올립니다.\r\n셔틀버스운행, 메뉴판 등이 바뀌지 않은 채 그대로 있습니다.\r\n개선 해 주시길 기대 합니다.', 'Y', '210.120.17.125', 1125618553, '2005-09-02 08:49:13'),
(39, 220, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '복지관 사업에 대한 문의는 전화로 받습니다.', 'Y', '211.201.234.183', 1133752850, '2005-12-05 12:20:50'),
(40, 251, NULL, NULL, '', '유신사', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '한해동안 복지관 운영에 한치의 오차도 없게 운영하여 주시기를 바랍니다\r\n부탁의 말슴은 \r\n1.  너무나 텃세를 하는분이 있는데 시정을 바랍니다 우리60대붙어89십대고요 어린애도 아닌데?\r\n2.  색안경 쓰고 보지 않았스면 합니다 총반장께서 앞장서서 시정을 부탁 합니다', 'Y', '220.86.119.115', 1138591263, '2006-01-30 12:21:03'),
(41, 251, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '구로 복지관 전어르신들님 올해에도 한분의 낙오 없이 겅강과 행복 하고 즐겁게\r\n\r\n 한해를 보내주시기 빕니다 !^*^', 'Y', '220.86.119.115', 1138591405, '2006-01-30 12:23:25'),
(42, 251, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '총반장님 한쪽으로 치우치지말고요 잘못하면 꾸중도 하고 잘하면 친찬도 하여 주면서 \r\n\r\n힘들지만 불평 안나오게 운영 하여주세요 감가합니다!^*^', 'Y', '220.86.119.115', 1138591578, '2006-01-30 12:26:18'),
(43, 256, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '저희 복지관에서도 현재 가락장구반을 운영하고 있어 신규반 개설이나 강사채용계획이 없습니다.\r\n추후 강사채용 시 공지하도록 하겠습니다.\r\n감사합니다.', 'Y', '61.34.212.6', 1139886636, '2006-02-14 12:10:36'),
(137, 6249, NULL, NULL, '', '민들레', '', '*9AD05ACAC9B0FAD1BB7EF1E76E42580E4F2FC9D7', '', 'Y', '58.234.145.55', 1511990840, '2017-11-30 06:27:20'),
(45, 309, NULL, NULL, '', '청-춘', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '답이 허위입니다 대나제 여러 어르신 들이 보는앞에서 본인 허락 없이 뒤에서 두번 씩이나 안아주는것이 복지관 총무부장의 인사법인지 알고 푸며 눈을 가렷다고 하는데 당사사 죽지 않고 살아 있스며 수치심 때문애 집에서 칩거 하고 있습니다 왜거짓말을 하는지요 지위를 이용하여 목적을 달성 하였다고 보는지요 ? 늙지도도 않고 더젊어 졌네요 하는소리의 의미는 잘못 하엿스면 시인하고  사과를 하여야지 부장실로 불러다가하는소리 관장님 앞에가서도 그대로 고하라고요 총무부장이란 직위를 이용하여 그렇게 하여도 되는지 되 묻고푸네요 여러사람 중에서 \r\n그사람만 안아 주웠는지요 ?  확실한 답변 하세여 부장님', 'Y', '220.86.119.134', 1143339577, '2006-03-26 11:19:37'),
(46, 427, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요 구로노인 결연담당자입니다.\r\n일단 구로노인복지관 후원사업에 동참해 주셔서 감사드립니다.\r\n후원자님께서 보내주신 신청서는 잘 받았습니다. \r\n현재 전산적으로 결연절차는 완료된 상태이고, 관련된 서류를 오늘내로 우편으로 보내드리겠습니다. 혹시 문의사항이 있으시면 837-9595로 언제든지 연락주십시오. 감사합니다^^', 'Y', '211.212.213.58', 1156386192, '2006-08-24 11:23:12'),
(47, 410, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요. 구로노인복지관 후원담당자입니다.\r\n복지관 후원사업에 관심 갖어 주셔서 감사합니다.\r\n후원자님의 정성과 사랑을 잘 받아 복지관 어르신 뿐 아니라 구로구내 어려우신 분들에게 고이 전달하도록 하겠습니다. 다시 한번 감사드립니다.\r\n추신)답변이 너무 늦어진 점 진심으로 사과 말씀드립니다. ', 'Y', '211.212.213.58', 1156386399, '2006-08-24 11:26:39'),
(48, 506, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '손혜원 후원자님 안녕하세요?\r\n전에 전화드린 결연후원담당 서효열 사회복지사입니다.\r\n먼저 후원과정이 오래걸려 직접 문의를 하시게끔 버거롭게 해드려 진심으로 사과 말씀 올립니다.\r\n후원자님의 개인 메일을 통해 문의사항에 대한 자세한 답변을 보내드렸습니다..\r\n확인하시고 궁금한 사항이나 기타 다른 문의사항이 있으시다면 언제든지 게시판이나 전화(837-9595)를 통해 문의해 주시기 바랍니다..\r\n복지관 결연후원사업에 깊게 관심 가져주셔서 감사합니다.\r\n', 'Y', '211.44.242.118', 1162869127, '2006-11-07 12:12:07'),
(49, 577, NULL, NULL, '', '옆집 아저씨', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '근로 능력을 제공하는 사람 입장에서 근무하게 될 곳의 급여를 문의하는 것은 절대 실례가 아닙니다. 당연한 권리입니다. 우리 이제는 급여문제에 너무 위축되지 마십시다.', 'Y', '61.101.150.97', 1169193640, '2007-01-19 17:00:40'),
(50, 939, NULL, NULL, '', 'skyy1212', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'ㅠㅠ 복지관에서 근무하시는 분들 공무원 아닙니까?\r\n요즘 취업고에 시달리는 젊은 인재들을 위해 그런 분들은 좀 물러나시는게 어떨지... ', 'Y', '211.173.9.14', 1204184388, '2008-02-28 16:39:48'),
(51, 1015, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요~ \r\n학생께 먼저 사과드려야겠네요... 지금 답변하기엔 시기적으로 민망하지만, \r\n저희 기관에 전화문의 했으리라 생각하구요, \r\n- 저희기관은 7월경에 8명정도로 실습이 진행될 예정이고, \r\n- 공문접수 선착순으로 모집 예정입니다. \r\n- 5월말정도에8 명 확정인원 선정되면 해당학교 사회복지학과 조교실로 통보예정입니다.\r\n- 참고로 해주시고 자세한 문의 필요하시면 복지관 실습담당자를 찾아주세요~   \r\n\r\n ', 'Y', '61.34.212.6', 1211187445, '2008-05-19 17:57:25'),
(52, 1098, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '감사합니다. 앞으로도 더욱 어르신들을 위해 노력하는 구로노인종합복지관이 되겠습니다~', 'Y', '61.34.212.6', 1216879649, '2008-07-24 15:07:29'),
(53, 1331, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '저희 구로노인종합복지관에 관심 가져주셔서 감사합니다. 곧 수정된 약도를 올릴 예정입니다. \r\n좋은 하루되세요. ^^', 'Y', '61.34.212.6', 1245229198, '2009-06-17 17:59:58'),
(54, 1343, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '2010년 신규 시간표 인쇄 시 참고하여 기입하도록 하겠습니다. ', 'Y', '61.34.212.6', 1253062884, '2009-09-16 10:01:24'),
(55, 1344, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요? 2009년 겨울방학 실습과 관련한 공지사항은 아직 없습니다. 추후에 게시판에 공지되는 내용을 참고하세요. 감사합니다. ^^ \r\n \r\n \r\n', 'Y', '61.34.212.6', 1253511686, '2009-09-21 14:41:26'),
(56, 1346, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요? 위와 관련한 자세한 사항은 전화하셔서 복지과장님께 문의해주세요. 감사힙니다.', 'Y', '61.34.212.6', 1253751067, '2009-09-24 09:11:07'),
(57, 1347, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요? 공지사항 게시판 No.170, 또는 No 192의 예전 자료를 참고하시면 도움되실듯 합니다. 감사합니다. ', 'Y', '61.34.212.6', 1254188819, '2009-09-29 10:46:59'),
(58, 1353, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요? 추후에 게시판을 통해 공지 할 계획을 갖고 있으며, 좀 더 자세한 내용은 담당 복지과장을 통해 전화 문의하세요. 감사합니다. ', 'Y', '61.34.212.6', 1258071253, '2009-11-13 09:14:13'),
(59, 1350, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '여러번 실습문의 하시게한점 사과드립니다. 저희기관에서 봉사도 하셨었다니 반갑네요. No1357번 게시물로 참고하시어, 해당학교 과사무실에서 저희 기관으로 실습요청 공문을 보내주시면 됩니다. 선착순이니깐 참고하세요~ 기회가 되면 뵙겠습니다^^', 'Y', '61.34.212.6', 1258444488, '2009-11-17 16:54:48'),
(60, 1355, NULL, NULL, '', '도송 구재운', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '09,11월 복지관 예술제 사진 일부를 올리고,\r\n추가  사진이 필요하신 분은 별도 보내 드리겠습니다 --도송', 'Y', '221.139.29.185', 1258452665, '2009-11-17 19:11:05'),
(61, 1357, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요? 저희 구로노인종합복지관에 관심 가져 주셔서 감사합니다. 문의하신 사회교육 프로그램 접수는 2010년 1/11(월) ~ 1/13(수)이며, 1/14(목) 추첨 및 결과발표, 1/18(월) 개강입니다.', 'Y', '61.34.212.6', 1259569339, '2009-11-30 17:22:19'),
(62, 1360, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '멋쟁이할머님께!\r\n저는 지나가는 나그네입니다.어르신의 건의처럼 강사가 인사를 해도 못본척하고 무시하는 것 같아 기분나쁘신 것은 충분히 이해가 갑니다.그러나 모든 사람들은 죽을 때까지 배우고 깨우칩니다.자식들도 그렇고 요즘 젊은 대학생, 고등학생들도 마찬가지입니다.\r\n무엇이 잘 안되시면 선생님께 말씀하셔서 이런이런부분은 시정해 달라고 하시면 아마도 강사분이 어르신의 말씀을 듣지 않을까 생각되구요, 어르신 한분 한분의 비위를 다 맞추다보면 실제로 배가 산으로 갈 수 있습니다.\r\n어르신들이 강사를 가지고 구청장님께 건의하는 것은 맞지 않는 것입니다.수업 중에 선생님과 말씀을 하시든지 수업 후에 건의를 하시거나 복지관 담당자와 강사와 함께 상담을 하신 후에 불만을 토로하셔도 될 것 같습니다.   ', 'Y', '61.42.54.131', 1262854767, '2010-01-07 17:59:27'),
(63, 1360, NULL, NULL, '', '이춘화', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '저는 지하노래방을 가끔 이용을 하는데 노래방기기가  정상이 아니라 취미로 즐기기엔\r\n불평들이 많습니다.소리가 나왔다 안나왔다 잡음도나고 문론  여러분이 쓰다보니 고장이  \r\n잦을수 있겠지만 그기간이 너무 오래된것같아 건의드립니다.\r\n빨리 고쳐주세요.부탁 드릴께요.\r\n\r\n', 'Y', '116.34.152.79', 1264416415, '2010-01-25 19:46:55'),
(64, 1371, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '본 복지관에서는 어르신들께 흘러간 노래와 최신가요를 배울 수 있는 가요교실을 주 3회 진행하고 있습니다. 또한,가요교실에 배운 노래들을 어르신들께서 연습할 수 있도록 지하 노래방에서 월~목요일 오후 1시부터 2시 30분까지 노래방을 운영하고 있습니다. 이에 신곡을 배운 어르신들께서 지하 노래방에 신곡이 입력이 되어 있지 않아 불편하다는 의견이 있어 5월 중으로 지하노래방의 기계에 따뜻한 신곡을 추가로 입력시키도록 하겠습니다.\r\n구로노인종합복지관에 관심과 애정을 보여주시는 모든 어르신들의 건강과 행복을 기원합니다. \r\n감사합니다.\r\n\r\n', 'Y', '61.34.212.6', 1272939003, '2010-05-04 11:10:03'),
(65, 1426, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '안녕하세요! 구로노인종합복지관 류림화 팀장입니다. \r\n기다리셨을텐데 답변이 늦어서 죄송합니다. \r\n올려주신 글을 찬찬히 읽어보았습니다. 저희 복지관은 신도림역에 위치한 &#039;구로노인종합복지관&#039;입니다. 올리신 글의 내용으로 보아 &#039;구로종합사회복지관&#039;에 올리시려던 글인듯 하네요.\r\n비록 저희 복지관에서 일어난 내용은 아니지만, 글을 읽으며 업무 시 저희들의 자세와 마음가짐에 대해 다시 한번 되돌아 보게 됩니다. \r\n말씀해주신 바를 토대로 저희 복지관 역시 고객(어르신, 자원봉사자, 후원자 등)을 위한 서비스와 배려에 더욱 주의를 기울여야겠단 다짐을 해봅니다. \r\n부디, 이번 일이 마음 편히 잘 해결되었으면 하는 바람입니다. 감사합니다.', 'Y', '61.34.212.6', 1305183033, '2011-05-12 15:50:33'),
(66, 1476, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '뚜레주르 신도림초점에서 복지관과 지역 어르신들을 위해 지원해 주시는 맛있는 케&amp;#51084;입니다. 구로구 안에서 진행되는 많은 나눔들을 통해 살기 좋은 구로구가 되는 것이 느껴지는 하루 입니다 ^^ ', 'Y', '61.34.212.6', 1354237025, '2012-11-30 09:57:05'),
(67, 1024, NULL, NULL, '', 'RabossDot', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Здарова! \r\nвидеосъемка спб цены\r\nвидеосъемка спб детских праздников\r\nвидеосъемка клипа спб\r\n \r\nhttp://piano-digital.ru \r\nhttp://piano-digital.ru/videosemka-vypiski-iz-roddoma-spb.html\r\nhttp://piano-digital.ru/videosemka-spb-snyat-videorolik.html\r\n', 'Y', '77.244.21.32', 1437391767, '2015-07-20 20:29:27'),
(68, 1024, NULL, NULL, '', 'Angelmix', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Le Monde.fr publie son texte en integralite. Depuis bientot un an, ils ne se sont pas bouscules.  http://lenitsky.com/ Disparue l epee de Damocles. Depuis, elle n a rien recu. 4 Les operations de tannerie 1,93 million . ', 'Y', '178.94.20.54', 1437449541, '2015-07-21 12:32:21'),
(69, 1669, NULL, NULL, '', '도데체가', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '머징...오늘 여기 시끄럽겠네요 도데체가 천주교에서는 이리 가르치나요\r\n이러니 개신교나 천주교나 욕을 듣는겁니다 \r\n요즘 하나님어쩌고 하는 단체는 상받은걸로 광고하고 날리인데 ...\r\n이런거 보면 반성해야 합니다', 'Y', '183.104.108.156', 1437695338, '2015-07-24 08:48:58'),
(70, 1669, NULL, NULL, '', '환갑은노인?', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '총리가 사진상의 어르신보다 더 나이를 드셨나보죠~~~~ 총리는 1957년 4월 15일생이시네요~ \r\n요즘은 환갑두 않되신 분이 노인소리 듣나봐요~ ㅎ ', 'Y', '14.48.153.36', 1437701843, '2015-07-24 10:37:23'),
(71, 1669, NULL, NULL, '', '머저리들', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '알아서기는 머저리같은 인간들!!!', 'Y', '211.185.177.2', 1437702280, '2015-07-24 10:44:40'),
(72, 1024, NULL, NULL, '', 'Angelmix', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Neveu dans un requisitoire guerrier. Ils craignent une reduction du nombre de boutiques.  http://lenitsky.com/ Mais le reste est lie a nos comportements. J aurai une grosse cicatrice en bas de mon ventre. Les avocats comme leurs clients etaient atterres. ', 'Y', '178.94.53.243', 1437705348, '2015-07-24 11:35:48'),
(73, 1024, NULL, NULL, '', 'Angelmix', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'de limiter les regles au strict minimum. Pour beaucoup sous l impulsion des jeunes.  &lt;a href=&quot;http://lenitsky.com/&quot;&gt;Andrey Lenitsky&lt;/a&gt; Plus d un tiers des malades en sont morts. Un pouce leve et un sourire des benevoles. Trop tard pour cette annee. ', 'Y', '178.94.53.243', 1437705811, '2015-07-24 11:43:31'),
(74, 1666, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '슬프네요 높으신분 접대하느라 가장 높이 대접해드려야 어르신들께는 이런 대접이라니...당당하지못하네요 발바닥 비비는 놀인 이제그만', 'Y', '121.135.129.16', 1437802233, '2015-07-25 14:30:33'),
(75, 1024, NULL, NULL, '', 'Janhmix', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Je suis profondement triste, au bord des larmes. Mais ce serait du plus mauvais effet.  http://lenitsky.com Estelle Conraux y reflechit aussi. Pour l instant, le sevrage est trop cher. Le CCNE rendra un rapport apres les etats generaux. ', 'Y', '178.94.61.51', 1437811966, '2015-07-25 17:12:46'),
(76, 1024, NULL, NULL, '', 'Yanhmix', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'доска опционов фортс стохастик rsi для бинарных опционов   http://option.inava.ru/map-31 бинарных опционов отзывы олимп трейд бинарные опционы   http://option.inava.ru/map-8 опцион на продажу лучшие стратегии для бинарных опционов   http://option.inava.ru/map-19 валютный опцион бинарные опционы андроид ', 'Y', '178.94.42.169', 1437831666, '2015-07-25 22:41:06'),
(77, 1024, NULL, NULL, '', 'Yanhmix', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'бинарных опционах что это точные сигналы бинарных опционов   http://option.inava.ru/map-22 бот для бинарных опционов трейдинг бинарных опционов   http://option.inava.ru/map-21 опцион википедия прибыльные стратегии по бинарным опционам   http://option.inava.ru/map-7 бездепозитный бонус на бинарных опционах 2015 бинарных опционах что это ', 'Y', '178.94.42.169', 1437832039, '2015-07-25 22:47:19'),
(78, 1024, NULL, NULL, '', 'Yanhmix', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'как заработать на турбо опционах торговля опционами онлайн   http://option.inava.ru/map-29 бинарные опционы стратегии для новичков сколько можно заработать на опционах   http://option.inava.ru/map-0 бинарные опционы сигналы по бинарным опционам   http://option.inava.ru/map-5 прогнозы для бинарных опционов стратегия бинарные опционы ', 'Y', '178.94.42.169', 1437832305, '2015-07-25 22:51:45'),
(79, 1669, NULL, NULL, '', '사신', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '좀지났는데 사과문이라두 올라왔나요?\r\n아지가지 사과안했나 보네\r\n빨리 사과하시지 친일파 넘들\r\n언능 대가리 숙이고 공식적으로 사과하고\r\n복지관 직원들 다 교체해라 \r\n개 쓰레기 같은 것들 ', 'Y', '223.62.219.243', 1438037667, '2015-07-28 07:54:27'),
(80, 1024, NULL, NULL, '', 'Michaelriz', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'D autres l accusent d avoir protГgГ les mГdecins.  http://kevinhearne.com/a-map-fr-accutane | Map fr accutane  Soignants et patients le dГplorent.  http://www.servaturhotels.com/a-map-de-tadalis | a-map-de-tadalis  Les implants ont ГtГ retirГs du marchГ en avril 2010.  http://www.bill613.com/a-map-es-lioresal | Map es lioresal ', 'Y', '79.110.25.155', 1438180591, '2015-07-29 23:36:31'),
(81, 1024, NULL, NULL, '', 'darejofaped87', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Привет! \r\nНа моем сайте - http://kote.ws - Вы не найдете пустой теоретической информации. Все что тут есть - результат работы и ошибок за более чем 10 лет работы в интернете. \r\nЯ не буду говорить что всегда все было гладко, так не бывает. Но на этом сайте я собрал весь свой опыт, который Вы можете перенять, и добиться еще больших успехов.', 'Y', '93.179.68.209', 1438224367, '2015-07-30 11:46:07'),
(82, 1024, NULL, NULL, '', 'Vanhmix', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'grand capital опционы опционы в россии  http://inreginfo.ru/map-18   график опционов торговля опционами демо  http://inreginfo.ru/map-23   биржа опционов хеджирование бинарных опционов  http://www.zomgitsplayable.ru/map-8   операции с опционами олимп трейд бинарные опционы     http://pd-ugra.ru/binarnye-opciony-v-rublyah.html ', 'Y', '79.110.25.225', 1438257342, '2015-07-30 20:55:42'),
(83, 1024, NULL, NULL, '', 'BarbaraDare', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'iq option тактика  http://rabota-uspeh.ru/программы-для-торговли-бинарными-опционами   аналитика бинарных опционов заработать на опционах  http://darjeelingteaxpress.ru/как-работают-бинарные-опционы   рейтинг бинарных опционов  http://wf-cheats.ru/как-правильно-торговать-на-бинарных-опционах   купить опцион     http://dir66.ru/лучшие-стратегии-с-бинарными-опционами    стратегии для опционов     http://bezdepozitny.ru/map-20 ', 'Y', '93.179.89.123', 1438536036, '2015-08-03 02:20:36'),
(84, 1024, NULL, NULL, '', 'BarbaraDare', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Il ne faut pas nous prendre pour des imbeciles.  http://inava.ru Le suspense sera bientot leve.  http://ne24.ru/ La logique serait alors d augmenter les rations.  http://a-meds.com/ La modification est effective depuis le 10avril 2012. ', 'Y', '5.101.217.109', 1438601043, '2015-08-03 20:24:03'),
(85, 1024, NULL, NULL, '', 'BarbaraDare', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Dix-huit mois plus tard pas de regrets.  http://inava.ru Les membres de ma famille ne se soulagent pas ainsi.  http://ne24.ru/ A son arrivee, en 2007, M.  http://a-meds.com/ Le desaccord sera acte dans le texte final. ', 'Y', '46.161.62.90', 1438739703, '2015-08-05 10:55:03'),
(86, 1024, NULL, NULL, '', 'BarbaraDare', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'En 1983, les chercheurs isolaient le VIH.  http://inava.ru L analyse principale ne retrouve pas de sur-risque.  http://ne24.ru/ Le proces doit durer jusqu au 17 mai.  http://a-meds.com/ C est excitant, s enthousiasme-t-il. ', 'Y', '5.8.37.212', 1438769875, '2015-08-05 19:17:55'),
(87, 1024, NULL, NULL, '', 'Michaelriz', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Rien ne filtre de ces trois jours.  http://www.bill613.com/a-map-en-celebrex | Map en celebrex  J essaie de faire ce qu il faut pour sauver des vies.  http://www.connect.org/a-map-en-coumadin | en coumadin  La maman Гtait enceinte de sept mois.  http://www.bill613.com/a-map-en-effexor | Map en effexor ', 'Y', '46.161.62.101', 1438941010, '2015-08-07 18:50:10'),
(88, 1024, NULL, NULL, '', 'BarbaraDare', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Le week-end, on a envie de se lacher.  http://inava.ru Un rapport devra etre remis en janvier 2013.  http://ne24.ru/ La suite des evenements aussi interroge.  http://a-meds.com/ Le constat n en reste pas moins affligeant. ', 'Y', '93.179.89.10', 1438943137, '2015-08-07 19:25:37'),
(89, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Тем временем Остромир подошел к Есене и протянул ему маленькую аспидную доску с записанной на ней задачей посложней.  http://kraisinform.ru/opcion-cennaya-bumaga.php | опцион ценная бумага http://make-cs.ru/iq-option-analizator-skachat.php | iq option анализатор скачать http://prostoegrul.ru/samyy-luchshiy-broker-binarnyh-opcionov-otzyvy.php | самый лучший брокер бинарных опционов отзывы http://goreview.ru/iq-option-minimalnyy-depozit.php | iq option минимальный депозит http://edu-support.ru/opciony-s-minimalnym-vlozheniem.php | опционы с минимальным вложением ', 'Y', '93.179.89.64', 1439074754, '2015-08-09 07:59:14'),
(90, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Не стало самого младшего Ильвинга, Вульф лишился опытного бойца, брошен вызов его клану.  http://customwritingwebsite.com/opciony-dostupnym-yazykom.php | опционы доступным языком http://edu-support.ru/put-option-fair-value-hedge.php | put option fair value hedge http://radioe1.ru/iq-option-opisanie.php | iq option описание http://buyessaywritingonline.com/kotirovki-opcionov.php | котировки опционов http://worldofsportsnews.ru/opciony-i-ih-vidy.php | опционы и их виды ', 'Y', '93.179.89.9', 1439106411, '2015-08-09 16:46:51'),
(91, 1024, NULL, NULL, '', 'Michaelriz', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'En juin 2012, ils Гtaient 52 %.  http://www.alpstourgolf.com/a-map-en-zithromax | en zithromax  Le Monde.fr publie son texte en intГgralitГ.  http://www.bicigrino.com/a-map-de-diflucan | a-map-de-diflucan  Aujourdв™hui, je nв™ai quasiment plus de migraines.  http://kevinhearne.com/a-map-en-lotemax | Map en lotemax ', 'Y', '146.185.201.28', 1439204739, '2015-08-10 20:05:39'),
(92, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Казеин, благодаря которому сандарак когда-то пристал к ткани, давно засох и превратился в пыль.  http://hotaudiobook.ru/kol-opcion.php | кол опцион http://odin-dollar.ru/binarnye-opciony-stati.php | бинарные опционы статьи http://e-est.ru/opcionempleo.php | opcionempleo http://free-programm.ru/binarnye-opciony-alpari-otzyvy.php | бинарные опционы альпари отзывы http://bontalon.ru/kak-zarabotat-na-iq-option.php | как заработать на iq option ', 'Y', '46.161.62.92', 1439226279, '2015-08-11 02:04:39'),
(93, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Он щелчком забросил в окно монету в десять серебряных и прошел мимо, проигнорировав растерянное: - Спасибо, добрый господин.  http://buyessaywritingonline.com/metod-goncharova-binarnye-opciony.php | метод гончарова бинарные опционы http://eholotshop.ru/9-11-put-option.php | 9 11 put option http://argument-gifts.ru/torgovlya-ot-opcionnyh-urovney.php | торговля от опционных уровней http://buyessaywritingonline.com/iq-option-vk.php | iq option вк http://free-programm.ru/opcion-koll.php | опцион колл ', 'Y', '178.94.32.111', 1439262623, '2015-08-11 12:10:23'),
(94, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'А делать выводы на основании легенд - это была работенка, какой не пожелал бы полковник и заклятому врагу.  http://kraisinform.ru/opcion-na-pokupku-akciy.php | опцион на покупку акций http://radiosky.ru/besplatnye-signaly-dlya-binarnyh-opcionov.php | бесплатные сигналы для бинарных опционов http://buyessaywritingonline.com/trendovye-indikatory-dlya-binarnyh-opcionov.php | трендовые индикаторы для бинарных опционов http://worldofsportsnews.ru/kak-pokupat-opciony.php | как покупать опционы http://kraisinform.ru/option-com.php | option com ', 'Y', '178.94.32.111', 1439264013, '2015-08-11 12:33:33'),
(95, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Сталин рассуждал так: &quot;Первая мировая война вырвала одну страну из капиталистического рабства.  http://make-cs.ru/60-sekund-strategii-torgovli-opcionu.php | 60 секунд стратегии торговли опциону http://edu-support.ru/strategiya-martingeyla-na-binarnyh-opcionah.php | стратегия мартингейла на бинарных опционах http://edu-support.ru/shkola-binarnyh-opcionov.php | школа бинарных опционов http://bontalon.ru/video-indikatora-opciony.php | видео индикатора опционы http://free-programm.ru/binarnye-opciony-otkryt-schet.php | бинарные опционы открыть счет ', 'Y', '5.101.217.60', 1439265227, '2015-08-11 12:53:47'),
(96, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'И отхлебнув, сколько хватает дыхания, заставляет отпить Дениса, а затем до дна - Антона.  http://goreview.ru/sergey-mironov-opciony-otzyvy.php | сергей миронов опционы отзывы http://bontalon.ru/call-option-trading.php | call option trading http://radioe1.ru/grafiki-opcionov-v-realnom-vremeni.php | графики опционов в реальном времени http://radioe1.ru/iq-option-2015-vyvod-deneg.php | iq option 2015 вывод денег http://oao-vkz.ru/treyder-binarnye-opciony.php | трейдер бинарные опционы ', 'Y', '93.179.89.87', 1439271754, '2015-08-11 14:42:34'),
(97, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Но разумное &quot;нет&quot; означало &quot;нет&quot; всему ценному - истине и смыслу, и тем самым тоже было безумно.  http://goreview.ru/kak-zarabotat-na-iq-option.php | как заработать на iq option http://iwomentop.ru/binarnye-opciony-minimalnaya-stavka.php | бинарные опционы минимальная ставка http://iwomentop.ru/finansovye-opciony-spravochnik-putevoditel.php | финансовые опционы справочник путеводитель http://worldofsportsnews.ru/indikator-torgovyh-signalov.php | индикатор торговых сигналов http://make-cs.ru/novosti-opcionov.php | новости опционов ', 'Y', '146.185.201.101', 1439273203, '2015-08-11 15:06:43'),
(98, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Жена губернатора, стоявшая рядом с миссис Модести, улыбалась и кивала, указывая веером на площадку для танцев.  http://pierre1.ru/binarnye-opciony-prakticheskoe-rukovodstvo.php | бинарные опционы практическое руководство http://comp4k.ru/dosrochnoe-zakrytie-opciona.php | досрочное закрытие опциона http://free-programm.ru/zarabotok-na-binarnyh-opcionah-realno.php | заработок на бинарных опционах реально http://argument-gifts.ru/kak-torgovat-na-turbo-opcionah.php | как торговать на турбо опционах http://argument-gifts.ru/call-option-formula.php | call option formula ', 'Y', '93.179.89.125', 1439274780, '2015-08-11 15:33:00'),
(99, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Он крепко держал ее, не хотел отпускать - несмотря на боль, страх, смущение, - Тесса понимала это.  http://customwritingwebsite.com/roman-stroganov-binarnye-opciony.php | роман строганов бинарные опционы http://pierre1.ru/doveritelnoe-upravlenie-opciony.php | доверительное управление опционы http://msi-vystavki.ru/put-option-youtube.php | put option youtube http://eholotshop.ru/first-binary-option-service-voyti.php | first binary option service войти http://sov-dance.ru/opcion-na-fuchers-rts.php | опцион на фьючерс ртс ', 'Y', '93.179.89.22', 1439276294, '2015-08-11 15:58:14'),
(100, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'И там, где должно было раздаться слово апостольское, дело решила шальная офицерская пуля.  http://edu-support.ru/opcion-instaforex.php | опцион instaforex http://e-est.ru/io-option-binarnye-opciony.php | io option бинарные опционы http://comp4k.ru/iq-option-v-rublyah.php | iq option в рублях http://comp4k.ru/brokery-binarnye-opciony.php | брокеры бинарные опционы http://free-programm.ru/binarnye-opciony-i-foreks.php | бинарные опционы и форекс ', 'Y', '5.8.37.239', 1439277801, '2015-08-11 16:23:21'),
(101, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Но когда я пошла дальше, все выше поднимались стены домов телестре, и единственным, что я еще могла видеть, были звезды.  http://oao-vkz.ru/binarnye-opciony-lohotron.php | бинарные опционы лохотрон http://bontalon.ru/binarnye-opciony-zakrytie.php | бинарные опционы закрытие http://free-programm.ru/investirovanie-opciony.php | инвестирование опционы http://pierre1.ru/brokery-binarnyh-opcionov-s-bezdepozitnym-bonusom.php | брокеры бинарных опционов с бездепозитным бонусом http://kraisinform.ru/investirovanie-v-opciony.php | инвестирование в опционы ', 'Y', '91.239.24.4', 1439279297, '2015-08-11 16:48:17'),
(102, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Недаром карлики пользовались дурной славой даже в Мидгарте, где их не особенно часто можно встретить.  http://free-programm.ru/call-option-dividend-formula.php | call option dividend formula http://make-cs.ru/binarnye-opciony-strategii-na-15-minut.php | бинарные опционы стратегии на 15 минут http://free-programm.ru/torgovlya-opcionami-v-izraile.php | торговля опционами в израиле http://comp4k.ru/opcion-vne-deneg.php | опцион вне денег http://iwomentop.ru/rabota-v-internete-binarnye-opciony.php | работа в интернете бинарные опционы ', 'Y', '146.185.200.117', 1439280894, '2015-08-11 17:14:54'),
(103, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Пленных херулийцев связали по рукам и ногам и посадили на одну из телег, которые отправлялись с отрядом.  http://msi-vystavki.ru/opciony-obuchenie-video.php | опционы обучение видео http://prostoegrul.ru/call-option-zero-volatility.php | call option zero volatility http://comp4k.ru/binary-options.php | binary options http://eholotshop.ru/put-option-exercise-price.php | put option exercise price http://argument-gifts.ru/kak-obmanut-binarnye-opciony.php | как обмануть бинарные опционы ', 'Y', '5.101.222.51', 1439282480, '2015-08-11 17:41:20'),
(104, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Она представила, как его широкая ладонь гладит ее по щеке и по волосам, и ей стало приятно.  http://oao-vkz.ru/ooo-opcion-m-lipeck.php | ооо опцион м липецк http://worldofsportsnews.ru/ios-7-reject-call-option.php | ios 7 reject call option http://radioe1.ru/smotret-binarnye-opciony.php | смотреть бинарные опционы http://oao-vkz.ru/mironov-opciony.php | миронов опционы http://pierre1.ru/binarnye-opciony-bonus.php | бинарные опционы бонус ', 'Y', '46.161.62.110', 1439310014, '2015-08-12 01:20:14'),
(105, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'С потребительской корзиной у наших гоблинов все в порядке, хлеба хватает, а без зрелищ они обходятся.  http://bontalon.ru/signaly-torgovyh-sistem.php | сигналы торговых систем http://buyessaywritingonline.com/forum-binarnye-opciony-indikatory.php | форум бинарные опционы индикаторы http://iwomentop.ru/torgovye-sistemy-torgovli-binarnymi-opcionami.php | торговые системы торговли бинарными опционами http://bontalon.ru/oshibka-pokupki-opciona.php | ошибка покупки опциона http://argument-gifts.ru/vega-opciona.php | вега опциона ', 'Y', '79.110.25.197', 1439324130, '2015-08-12 05:15:30'),
(106, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Нормальная комната, побогаче, чем у них дома, но с гостиной доктора Добронрава сравнить нельзя.  http://make-cs.ru/kak-rabotat-na-opcionah.php | как работать на опционах http://eholotshop.ru/robot-binarnyh-opcionov.php | робот бинарных опционов http://edu-support.ru/opciony-eur-usd.php | опционы eur usd http://bontalon.ru/torgovlya-na-binarnyh-opcionah.php | торговля на бинарных опционах http://prostoegrul.ru/binarnye-opciony-demura.php | бинарные опционы демура ', 'Y', '5.101.222.20', 1439594459, '2015-08-15 08:20:59'),
(107, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Как шкурка, из которой вынули плоть и душу - шейте шапку, воротник, только чтоб не было слишком больно...  http://hotaudiobook.ru/iq-option-mmgp.php | iq option mmgp http://bontalon.ru/put-option-100-shares.php | put option 100 shares http://argument-gifts.ru/alpari-binarnye-opciony.php | альпари бинарные опционы http://argument-gifts.ru/raschet-opcionnyh-urovney.php | расчет опционных уровней http://oao-vkz.ru/kto-nibud-zarabotal-na-binarnyh-opcionah.php | кто нибудь заработал на бинарных опционах ', 'Y', '46.161.63.48', 1439737174, '2015-08-16 23:59:34'),
(108, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Но, честное слово, три дня прошло, а мне уже кажется, что мозги у меня начали обрастать мхом и плесенью.  http://fontanotshop.com/downloader/skin/install/download/map-43.html И эльф совершенно не обратил внимания на то, как облегченно вздохнул и расслабился гоббер.  http://memoiretraumatique.org/map-8.html Так пахнет соль, - Полоз подобрал из-под ног извивистый сук и прижал его к носу, - вот, он пахнет морем. Элвин не хотел, чтобы Артур залезал в лодку в своем нынешнем обличье и оставлял там следы.  http://fontanotshop.com/downloader/skin/install/download/map-29.html http://fontanotshop.com/downloader/skin/install/download/map-4.html ', 'Y', '79.110.25.154', 1439756590, '2015-08-17 05:23:10'),
(109, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Когда я начинаю смеяться в бою, когда кровь застилает глаза, когда все живое вызывает лишь желание убивать...  http://eholotshop.ru/kak-torgovat-opcionami-v-quik.php | как торговать опционами в quik http://odin-dollar.ru/binarnye-opciony-demura.php | бинарные опционы демура http://free-programm.ru/binarnye-opciony-reyting.php | бинарные опционы рейтинг http://edu-support.ru/call-option-rho-positive.php | call option rho positive http://pierre1.ru/zarabotok-na-binarnyh-opcionah.php | заработок на бинарных опционах ', 'Y', '146.185.200.18', 1439817697, '2015-08-17 22:21:37'),
(110, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'И потом, положив его назад в люльку, я уже знал, что никогда больше не смогу пронести его по лестнице.  http://iwomentop.ru/fuchersnye-opciony.php | фьючерсные опционы http://radioe1.ru/iq-option-vyvod-sredstv.php | iq option вывод средств http://pierre1.ru/luchshie-binarnye-opciony-otzyvy.php | лучшие бинарные опционы отзывы http://radiosky.ru/analiz-opcionnyh-urovney.php | анализ опционных уровней http://radioe1.ru/binarnye-opciony-kak-zarabotat.php | бинарные опционы как заработать ', 'Y', '5.101.222.20', 1439851045, '2015-08-18 07:37:25'),
(111, 1716, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '축하합니다!!~ ', 'Y', '220.120.208.124', 1439884460, '2015-08-18 16:54:20'),
(112, 1716, NULL, NULL, '', '', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '여튼 최우수상 추카 ^^; 동참합니다.', 'Y', '211.195.158.37', 1439945790, '2015-08-19 09:56:30'),
(113, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Точно краб, примостился он среди скал и приливно-отливных озер: темный, укрытый от посторонних глаз, хорошо защищенный.  http://foto-antoniy.ru/it/opzioni-binarie-60-secondi-1 | Opzioni binarie 60 secondi 1 http://drive31.ru/de/www-bdswiss-vom | Www bdswiss vom http://bitvion.ru/it/trader-online | Trader online http://styleindetails.ru/it/segnali-trading-opzioni-binarie-gratis | Segnali trading opzioni binarie gratis http://hotline-kuzbass.ru/it/opzioni-binarie-investimenti | Opzioni binarie investimenti ', 'Y', '46.161.62.60', 1440102766, '2015-08-21 05:32:46'),
(114, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'В нескольких сотнях метров от нас на берегу лежала еще одна лодка, покинутая хозяевами и предоставленная воле волн.  http://foto-antoniy.ru/it/qoption-binary | Qoption binary http://new-academy.ru/it/opzioni-binarie-fare-pratica-con-conto-gratuito | Opzioni binarie fare pratica con conto gratuito http://salambula.ru/de/binare-optionen-trader-kopieren | Binare optionen trader kopieren http://new-academy.ru/it/auto-opzione-binarie-recensioni | Auto opzione binarie recensioni http://bitvion.ru/de/binare-optionen-ohne-mindesteinzahlung | Binare optionen ohne mindesteinzahlung ', 'Y', '46.161.63.64', 1440140226, '2015-08-21 15:57:06'),
(115, 1024, NULL, NULL, '', 'LawandaLaxy', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Сетин наблюдала за ней через небольшой столик, а у окна сидела молодая женщина и кормила грудью ребенка.  http://salambula.ru/de/binare-optionen-metatrader-broker | Binare optionen metatrader broker http://bi-context.ru/it/pokemon-trading-card-games-online | Pokemon trading card games online http://hotline-kuzbass.ru/it/trade-option | Trade option http://salambula.ru/it/pro-binary-option | Pro binary option http://hotline-kuzbass.ru/it/operazione-binaria-trading | Operazione binaria trading ', 'Y', '5.101.222.93', 1440241379, '2015-08-22 20:02:59'),
(116, 1024, NULL, NULL, '', 'RonaldMt', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'J Гtais dans une spirale.  http://www.zuccari.com/a-map-1  Comme Eric, 54 ans, adressГ par un pneumologue.  http://www.grecianbay.com/a-map-8  On n aime pas en parler.  http://www.secforestales.org/a-map-1  \r\nSon seul souci : elle a grossi de 6 kg.\r\nUn geste simple, mais pas systГmatique.\r\nC est un projet colossal.\r\nMais lГ, ma colГЁre a ГclatГ.\r\nJ ai pris pas mal de poids, c est vrai.\r\n', 'Y', '5.101.222.73', 1440250971, '2015-08-22 22:42:51'),
(117, 1024, NULL, NULL, '', 'RonaldMt', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Ce n est pas de savoir si c est de l euthanasie ou non.  http://www.zuccari.com/a-map-10  Difficile de faire parler les conseillers.  http://www.servaturhotels.com/a-map-10  Ils n arrivent pas Г dire non, alors ils payent.  http://www.secforestales.org/a-map-11  \r\nEt leurs questions restent toujours sans rГponse.\r\nSans compter quatorze recommandations.\r\nDe quand date ce clivage ? De l aprГЁs-Mai 68.\r\nSon auteure : Felicitas Roher.\r\nChercheur prestigieux, M.\r\n', 'Y', '46.161.63.61', 1440560762, '2015-08-26 12:46:02'),
(118, 1024, NULL, NULL, '', 'RonaldMt', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Le pГЁre d une copine l a transportГe Г l hГpital.  http://www.servaturhotels.com/a-map-0  La France, elle, tarde.  http://www.servaturhotels.com/a-map-2  TГV annonГ§ait toujours ses visites.  http://www.pridenw.org/a-map-12  \r\nC Гtait une lycГenne de 17 ans.\r\nCertes, il n est de coutume de communiquer sur une AMM.\r\nDepuis, chacun dГfend ses intГrГts bec et ongles.\r\nL Alsace a obtenu trois contrats pour 2013.\r\nSeule une alliance peut les rГsoudre.\r\n', 'Y', '46.161.62.24', 1440863783, '2015-08-30 00:56:23'),
(119, 1024, NULL, NULL, '', 'Michaelriz', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Depuis, chacun dГfend ses intГrГts bec et ongles.  http://www.grecianbay.com/a-map-7  Ce n est pas Г l ordre du jour.  http://www.servaturhotels.com/a-map-10  Des propos restГs pour l instant sans lendemain.  http://www.pridenw.org/a-map-5 ', 'Y', '79.110.25.226', 1441106718, '2015-09-01 20:25:18'),
(120, 1718, NULL, NULL, '', '운영자', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '어르신소리함 게시판 성격과 맞지않아 글을 이동하였습니다. 양해부탁드립니다.', 'Y', '211.201.249.11', 1441260946, '2015-09-03 15:15:46'),
(121, 1717, NULL, NULL, '', '운영자', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '어르신소리함 게시판 성격과 맞지않아 글을 이동하였습니다. 양해부탁드립니다.', 'Y', '211.201.249.11', 1441260956, '2015-09-03 15:15:56'),
(122, 1716, NULL, NULL, '', '운영자', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '어르신소리함 게시판 성격과 맞지않아 글을 이동하였습니다. 양해부탁드립니다.', 'Y', '211.201.249.11', 1441260969, '2015-09-03 15:16:09'),
(123, 1664, NULL, NULL, '', '운영자', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '어르신소리함 게시판 성격과 맞지않아 글을 이동하였습니다. 양해부탁드립니다.', 'Y', '211.201.249.11', 1441261009, '2015-09-03 15:16:49'),
(124, 1024, NULL, NULL, '', 'Michaelriz', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Le jeune homme s en va, impassible.  http://kathycaprino.com/a-map-8  IncinГrer un cheval coГte de l argent.  http://kathycaprino.com/a-map-en-valtrex  Une affirmation qui fait bondir les concernГs.  http://www.chemtex.com/a-map-en-paxil ', 'Y', '46.161.62.64', 1441553500, '2015-09-07 00:31:40'),
(125, 1024, NULL, NULL, '', 'Michaelriz', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Pour autant, pas d enthousiasme excessif.  http://www.chemtex.com/a-map-de-celebrex  Je me sens comme un soldat du feu , lance M.Debuiche.  http://kathycaprino.com/a-map-en-priligy  A cet Гge, l amende ne serait pas satisfaisante.  http://mkuniversity.org/a-map-en-aldara ', 'Y', '146.185.201.40', 1441641229, '2015-09-08 00:53:49'),
(126, 1024, NULL, NULL, '', 'Benitomet', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Спроси любого из присутствующих - каждый скажет, что ему в гневе случалось совершать поступки, в которых он потом раскаивался.  http://7fabrika.ru/map-90 | Map-90   Вульф пошел с ним, чтобы пожелать счастливого пути своим витязям и сказать, что он постарается присоединиться к ним к началу сражения.  http://electrolux-tomsk.ru/map-25 | Map-25   http://twolions.ru/map-4 | Map-4     http://yandexxx.ru/map-99 | Map-99 ', 'Y', '178.94.85.154', 1441933071, '2015-09-11 09:57:51'),
(127, 1024, NULL, NULL, '', 'Benitomet', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Она провела малышку Пэгги в спальню за кухней, где они с Папой спали, когда принимали гостей.  http://electrolux-tomsk.ru/map-99 | Map-99   Она по опыту знала, что чем быстрее и дольше едет, тем меньше беспокоит ее этот ненавистный звук.  http://yandexxx.ru/map-5 | Map-5   http://trim-stroy.ru/map-54 | Map-54     http://twolions.ru/map-101 | Map-101 ', 'Y', '178.94.99.18', 1442015671, '2015-09-12 08:54:31'),
(128, 1024, NULL, NULL, '', 'Michaelriz', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'L accueil est tout sauf accessoire.  http://www.usacanadaregion.org/a-map-es-zithromax | Map es zithromax  Mais ce n est pas spГcifique Г la profession mГdicale.  http://mobilemoneyafrica.com/a-map-es-zithromax | Map es zithromax  C est lГ-dessus qu il faut travailler.  http://mobilemoneyafrica.com/a-map-nb-kamagra | Map nb kamagra ', 'Y', '5.8.37.225', 1442111645, '2015-09-13 11:34:05'),
(129, 1024, NULL, NULL, '', 'Michaelriz', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', 'Les avocats comme leurs clients Гtaient atterrГs.  http://ibray.pl/brvihg/cerita-dewasa-ngesek-ama-neneku.html  Histoire d un amour, Гd.  http://mos2014.ru/bol-she-60-muzeev-v-den-goroda-budut-rabotat-besplatno/?room/gullet.htmlJ%18View%201+%20similar%20products  Tout d un coup, il Гtait mort.  http://rawbeets.com/?list10=5576 http://dko.su/ggk5o3auq/www.kannada-tullu-tunne-kathe.in.php ', 'Y', '5.101.217.113', 1442899322, '2015-09-22 14:22:02'),
(130, 1847, NULL, NULL, '', '리홍균 Thomas.', '', '*1E57BCC5D6874230713DBEA29FB26F74692BF314', '1부를 보시고 나머지 부분은 저의 집을 방문해 주새요 대문이 열렸습니다\r\n고맙습니다', 'Y', '211.37.30.101', 1449991212, '2015-12-13 16:20:12'),
(132, 1980, NULL, NULL, 'ROOT', '관리자', '관리자', '*5767B619D29D3B5B9C12C42F52E0DEEEC3B3C839', '고객평가단으로 위촉되신 것을 진심으로 축하드립니다!!', 'Y', '112.220.69.146', 1459296520, '2016-03-30 09:08:40'),
(134, 1881, NULL, NULL, 'ROOT', '관리자', '관리자', '*5767B619D29D3B5B9C12C42F52E0DEEEC3B3C839', '함께 마음을 나누는 어르신들의 따뜻한 정성이 모여 어려운 이웃에게 전달되었습니다. 감사합니다!!! ^^', 'Y', '112.220.69.146', 1459296677, '2016-03-30 09:11:17'),
(135, 5847, NULL, NULL, '', '관리자', '', '*BFF28043C75232B1DF8A7CFE678082B812FFA595', '안녕하세요 구로노인종합복지관 입니다 ^^\r\n먼저 저희 복지관 프로그램에 관심 가져주셔서 감사합니다.\r\n말씀하신 실버가요제는 현재 관련 사진자료를 가지고 있으며 동영상 다시보기는 불가능함을 안내해드립니다. 양해부탁드리며, 사진자료 열람을 희망하시는 경우에는 내방을 부탁드리겠습니다.\r\n감사합니다 ^^', 'Y', '112.220.69.146', 1499387233, '2017-07-07 09:27:13'),
(136, 3159, NULL, NULL, 'ROOT', '관리자', '관리자', '*5767B619D29D3B5B9C12C42F52E0DEEEC3B3C839', '안녕하세요 구로노인종합복지관 입니다.\r\n먼저 복지관 시설로 인해 불편함을 드려서 대단히 죄송합니다.\r\n말씀하신 환풍기는 3월 16일 날짜로 모터를 교체하여 소음발생을 최소화 할 수 있도록 조치하였습니다.\r\n양해의 말씀 전해드리며, 앞으로도 저희 복지관은 지역주민들과 함께 상생하는 기관으로 거듭날 수 있도록 노력하겠습니다. 감사합니다.', 'Y', '112.220.69.146', 1499388555, '2017-07-07 09:49:15');

-- --------------------------------------------------------

--
-- 테이블 구조 `wk_bbs_notice`
--

CREATE TABLE `wk_bbs_notice` (
  `idx` int(11) NOT NULL,
  `category` varchar(10) DEFAULT NULL COMMENT '카테고리',
  `indexNo` varchar(50) DEFAULT NULL COMMENT '고유아이디',
  `user_id` varchar(20) DEFAULT NULL COMMENT '아이디',
  `user_name` varchar(20) DEFAULT NULL COMMENT '이름',
  `user_level` int(11) DEFAULT NULL COMMENT '레벨',
  `nickName` varchar(30) DEFAULT NULL COMMENT '닉네임',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `pwd` varchar(255) DEFAULT NULL COMMENT '비밀번호',
  `headtext` varchar(255) DEFAULT NULL COMMENT '말머리',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `html` enum('Y','N') DEFAULT NULL COMMENT 'Html 사용여부',
  `content` text COMMENT '내용',
  `linkUrl` text COMMENT '링크경로',
  `movie` text COMMENT '동영상경로',
  `hit` int(11) DEFAULT '0' COMMENT '조회수',
  `recom` int(11) DEFAULT '0' COMMENT '추천수',
  `recom_id` text COMMENT '추천아이디',
  `notice` enum('Y','N') DEFAULT 'N' COMMENT '공지글여부',
  `secret` enum('Y','N') DEFAULT 'N' COMMENT '비빌글여부',
  `view_ck` enum('Y','N') DEFAULT 'Y' COMMENT '노출여부',
  `fileName` text COMMENT '첨부파일 실제이름',
  `files` text COMMENT '첨부파일 변환이름',
  `files_comment` text COMMENT '파일설명',
  `fno` int(11) DEFAULT NULL COMMENT '글번호',
  `thread` varchar(255) DEFAULT NULL COMMENT '답변글번호',
  `user_ip` varchar(30) DEFAULT NULL COMMENT '아이피',
  `reg_date` int(11) DEFAULT NULL COMMENT '등록일',
  `date_tm` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '등록일',
  `pg_gb` varchar(10) DEFAULT NULL COMMENT '기기구분',
  `tb_gubun` varchar(40) DEFAULT NULL COMMENT '게시판구분',
  `sort_num` int(11) DEFAULT '0' COMMENT '순서'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='공지사항';

-- --------------------------------------------------------

--
-- 테이블 구조 `wk_bbs_notice_comment`
--

CREATE TABLE `wk_bbs_notice_comment` (
  `idx` int(11) NOT NULL,
  `Bidx` int(11) DEFAULT NULL COMMENT '게시판인덱스값',
  `indexNo` varchar(50) DEFAULT NULL COMMENT '고유아이디',
  `fb_tw_do` varchar(10) DEFAULT NULL COMMENT 'sns선택',
  `user_id` varchar(20) DEFAULT NULL COMMENT '아이디',
  `user_name` varchar(20) DEFAULT NULL COMMENT '이름',
  `nickName` varchar(30) DEFAULT NULL COMMENT '닉네임',
  `pwd` varchar(255) DEFAULT NULL COMMENT '비밀번호',
  `content` text COMMENT '내용',
  `view_ck` enum('Y','N') DEFAULT 'Y' COMMENT '노출여부',
  `user_ip` varchar(30) DEFAULT NULL COMMENT '아이피',
  `reg_date` int(11) DEFAULT NULL COMMENT '등록일',
  `date_tm` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '등록일'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='공지사항';

-- --------------------------------------------------------

--
-- 테이블 구조 `wk_board_category`
--

CREATE TABLE `wk_board_category` (
  `idx` int(11) NOT NULL,
  `indexNo` varchar(50) DEFAULT NULL,
  `tb_name` varchar(40) DEFAULT NULL,
  `ct_name` varchar(255) DEFAULT NULL,
  `sort_num` float DEFAULT NULL,
  `reg_date` datetime DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='게시판 카테고리';

--
-- 테이블의 덤프 데이터 `wk_board_category`
--

INSERT INTO `wk_board_category` (`idx`, `indexNo`, `tb_name`, `ct_name`, `sort_num`, `reg_date`) VALUES
(1, NULL, 'ko_data', '제품설명서', 1, '2015-10-07 09:37:35'),
(2, NULL, 'ko_data', '펌웨어', 2, '2015-10-07 09:37:42'),
(5, NULL, 'ko_faq', '제품구매', 1, '2015-10-07 09:48:37'),
(6, NULL, 'ko_faq', '제품사용', 3, '2015-10-07 09:48:42'),
(7, NULL, 'ko_faq', '기타', 4, '2015-10-07 09:48:45'),
(8, NULL, 'ko_faq', 'A/S', 2, '2015-10-07 11:54:16'),
(18, NULL, 'en_customer', 'A/S', 2, '2015-10-19 14:54:52'),
(9, NULL, 'ko_data', '제품사용법', 3, '2015-10-07 11:54:58'),
(10, NULL, 'ko_data', '홍보자료', 4, '2015-10-07 11:55:03'),
(11, NULL, 'ko_data', '기타', 5, '2015-10-07 11:55:06'),
(17, NULL, 'en_customer', 'Product Purchase', 1, '2015-10-19 14:54:47'),
(13, NULL, 'ko_customer', '제품구매', 1, '2015-10-07 16:05:28'),
(14, NULL, 'ko_customer', 'A/S', 2, '2015-10-07 16:05:33'),
(15, NULL, 'ko_customer', '제품사용', 3, '2015-10-07 16:05:37'),
(16, NULL, 'ko_customer', '기타', 4, '2015-10-07 16:05:41'),
(19, NULL, 'en_customer', 'Product Usage', 3, '2015-10-19 14:54:56'),
(20, NULL, 'en_customer', 'Etc', 4, '2015-10-19 14:55:02'),
(21, NULL, 'en_faq', 'Using LEETEK', 1, '2015-10-19 16:54:40'),
(22, NULL, 'en_faq', 'Care & Handling', 2, '2015-10-19 16:54:45'),
(23, NULL, 'en_faq', 'Repair', 3, '2015-10-19 16:54:49'),
(24, NULL, 'en_faq', 'Other', 4, '2015-10-19 16:54:55'),
(25, NULL, 'en_data', 'Catalog', 1, '2015-10-19 17:23:42'),
(26, NULL, 'en_data', 'Update', 2, '2015-10-19 17:23:45'),
(27, NULL, 'en_data', 'Manuals', 3, '2015-10-19 17:23:49'),
(28, NULL, 'en_data', 'Other', 4, '2015-10-19 17:23:54'),
(30, NULL, 'en_dealer', 'Notice', 1, '2015-10-20 17:59:33'),
(31, NULL, 'en_dealer', 'Catalog', 2, '2015-10-20 17:59:36'),
(32, NULL, 'en_dealer', 'Update', 3, '2015-10-20 17:59:39'),
(33, NULL, 'en_dealer', 'Manuals', 4, '2015-10-20 17:59:44'),
(34, NULL, 'en_dealer', 'Other', 5, '2015-10-20 17:59:48'),
(35, NULL, 'en_qna', 'Product Purchase', 1, '2015-10-23 16:34:47'),
(36, NULL, 'en_qna', 'A/S', 2, '2015-10-23 16:34:52'),
(37, NULL, 'en_qna', 'Product Usage', 3, '2015-10-23 16:34:56'),
(38, NULL, 'en_qna', 'Etc', 4, '2015-10-23 16:35:02');

-- --------------------------------------------------------

--
-- 테이블 구조 `wk_board_config`
--

CREATE TABLE `wk_board_config` (
  `idx` int(11) NOT NULL,
  `tb_name` varchar(40) DEFAULT NULL,
  `bbs_name` varchar(60) DEFAULT NULL,
  `bbs_skin` varchar(255) DEFAULT NULL,
  `adm_ck` varchar(10) DEFAULT NULL,
  `category_ck` enum('Y','N') DEFAULT 'N',
  `bbs_width` varchar(10) DEFAULT NULL,
  `listNum` int(11) DEFAULT NULL,
  `sub_cut` int(10) DEFAULT NULL,
  `cnt_cut` int(10) DEFAULT NULL,
  `picWidthNum` int(11) DEFAULT NULL,
  `blockNum` int(11) DEFAULT NULL,
  `fileNum` int(11) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `upfile_ck` varchar(4) DEFAULT NULL,
  `real_size_ck` varchar(4) DEFAULT NULL,
  `file_com_ck` varchar(4) DEFAULT NULL,
  `edit_ck` varchar(4) DEFAULT NULL,
  `reply_ck` varchar(4) DEFAULT NULL,
  `recom_ck` varchar(4) DEFAULT NULL,
  `secret_ck` varchar(4) DEFAULT NULL,
  `ip_ck` varchar(4) DEFAULT NULL,
  `rec_ck` varchar(4) DEFAULT NULL,
  `delete_ck` varchar(4) DEFAULT NULL,
  `list_view_ck` varchar(4) DEFAULT NULL,
  `rp_view_ck` varchar(4) DEFAULT NULL,
  `thumb_ck` varchar(4) DEFAULT NULL,
  `thumb_x` int(11) DEFAULT NULL,
  `thumb_y` int(11) DEFAULT NULL,
  `newDay` int(11) DEFAULT '1',
  `top_inc` text,
  `bottom_inc` text,
  `Llevel` varchar(100) DEFAULT NULL,
  `Vlevel` varchar(100) DEFAULT NULL,
  `Wlevel` varchar(100) DEFAULT NULL,
  `Alevel` varchar(100) DEFAULT NULL,
  `Rlevel` varchar(100) DEFAULT NULL,
  `Dlevel` varchar(100) DEFAULT NULL,
  `Wpoint` int(11) DEFAULT '0',
  `Apoint` int(11) DEFAULT '0',
  `Rpoint` int(11) DEFAULT '0',
  `boardAdmin` varchar(255) DEFAULT NULL,
  `sort_num` int(11) DEFAULT NULL,
  `reg_date` datetime DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='게시판정보';

--
-- 테이블의 덤프 데이터 `wk_board_config`
--

INSERT INTO `wk_board_config` (`idx`, `tb_name`, `bbs_name`, `bbs_skin`, `adm_ck`, `category_ck`, `bbs_width`, `listNum`, `sub_cut`, `cnt_cut`, `picWidthNum`, `blockNum`, `fileNum`, `file_size`, `upfile_ck`, `real_size_ck`, `file_com_ck`, `edit_ck`, `reply_ck`, `recom_ck`, `secret_ck`, `ip_ck`, `rec_ck`, `delete_ck`, `list_view_ck`, `rp_view_ck`, `thumb_ck`, `thumb_x`, `thumb_y`, `newDay`, `top_inc`, `bottom_inc`, `Llevel`, `Vlevel`, `Wlevel`, `Alevel`, `Rlevel`, `Dlevel`, `Wpoint`, `Apoint`, `Rpoint`, `boardAdmin`, `sort_num`, `reg_date`) VALUES
(19, 'free', '자유게시판', 'free', NULL, 'N', '100', 10, 50, 50, 0, 10, 3, 20, 'Y', '', '', '', 'Y', 'Y', '', '', '', 'N', '', '', 'Y', 292, 189, 1, '', '', '1/2/7/9/10/', '1/2/7/9/10/', '1/2/7/9/10/', '1/2////', '1/2/7/9//', '', 0, 0, 0, '', 4, '2015-11-23 15:23:03'),
(16, 'notice', '공지사항', 'basic', NULL, 'N', '100', 10, 60, 60, 0, 10, 3, 20, 'Y', '', '', '', '', '', '', '', '', 'N', '', '', 'Y', 292, 189, 1, '', '', '1/2/7/9/10/', '1/2/7/9/10/', '1/2////', '1/2////', '1/2/7/9//', '', 0, 0, 0, '', 1, '2015-11-23 15:23:03'),
(29, 'bookmark', '북마크', 'gallery', NULL, 'N', '100', 10, 50, 50, 0, 10, 3, 20, 'Y', '', '', '', 'Y', 'Y', '', '', '', 'N', '', '', 'Y', 292, 189, 1, '', '', '1/2/7/9/10/', '1/2/7/9/10/', '1/2/7/9/10/', '1/2////', '1/2/7/9//', '', 0, 0, 0, '', 4, '2015-11-23 15:23:03');

-- --------------------------------------------------------

--
-- 테이블 구조 `wk_category`
--

CREATE TABLE `wk_category` (
  `idx` int(10) UNSIGNED NOT NULL,
  `code` varchar(20) DEFAULT NULL COMMENT '메인코드번호',
  `code_gp` varchar(255) DEFAULT NULL COMMENT '구룹코드번호',
  `ct_name` varchar(100) DEFAULT NULL COMMENT '그룹이름',
  `fno` int(11) DEFAULT NULL COMMENT '그룹번호',
  `thread` varchar(255) DEFAULT NULL COMMENT '순서',
  `view_ck` enum('Y','N') DEFAULT 'Y' COMMENT '노출유무',
  `sort_num` int(11) DEFAULT NULL,
  `reg_date` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '등록일'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='그룹관리';

--
-- 테이블의 덤프 데이터 `wk_category`
--

INSERT INTO `wk_category` (`idx`, `code`, `code_gp`, `ct_name`, `fno`, `thread`, `view_ck`, `sort_num`, `reg_date`) VALUES
(1, 'CM0001', 'CM0001', '스키', 1, 'A', 'Y', 0, '2015-06-05 14:17:25'),
(2, 'CM0002', 'CM0002', '골프', 2, 'A', 'Y', 0, '2015-06-05 14:17:33'),
(3, 'PT0003', 'CM0001PT0003', '일본스키팀', 1, 'AA', 'Y', 0, '2015-06-26 18:01:54'),
(4, 'PT0004', 'CM0002PT0004', '일본골프팀', 2, 'AA', 'Y', 0, '2015-06-26 18:02:04'),
(5, 'PT0005', 'CM0001PT0003PT0005', '숙소팀', 1, 'AAA', 'Y', 0, '2015-06-26 18:18:32'),
(6, 'PT0006', 'CM0001PT0003PT0006', '관광팀', 1, 'AAB', 'Y', 0, '2015-06-29 16:20:43');

-- --------------------------------------------------------

--
-- 테이블 구조 `wk_mb_position`
--

CREATE TABLE `wk_mb_position` (
  `idx` int(11) UNSIGNED NOT NULL,
  `name` varchar(30) DEFAULT NULL COMMENT '직급명',
  `level` tinyint(2) DEFAULT NULL COMMENT '레벨',
  `reg_date` datetime DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='직급';

--
-- 테이블의 덤프 데이터 `wk_mb_position`
--

INSERT INTO `wk_mb_position` (`idx`, `name`, `level`, `reg_date`) VALUES
(1, '대표', 1, '2015-05-14 17:22:22'),
(2, '상무', 2, '2015-05-14 17:22:57'),
(3, '이사', 3, '2015-05-14 17:22:57'),
(4, '부장', 4, '2015-05-14 17:22:57'),
(5, '실장', 5, '2015-05-14 17:22:57'),
(6, '과장', 6, '2015-05-14 17:22:57'),
(7, '대리', 7, '2015-05-14 17:22:57'),
(8, '주임', 8, '2015-05-14 17:22:57'),
(9, '사원', 9, '2015-05-14 17:22:57');

-- --------------------------------------------------------

--
-- 테이블 구조 `wk_mb_rank`
--

CREATE TABLE `wk_mb_rank` (
  `idx` int(11) UNSIGNED NOT NULL,
  `name` varchar(30) DEFAULT NULL COMMENT '직위명',
  `level` tinyint(2) DEFAULT NULL COMMENT '레벨',
  `reg_date` datetime DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='직위';

--
-- 테이블의 덤프 데이터 `wk_mb_rank`
--

INSERT INTO `wk_mb_rank` (`idx`, `name`, `level`, `reg_date`) VALUES
(1, '팀장', 1, '2015-05-14 17:23:52'),
(2, 'PM', 2, '2015-05-14 17:23:52'),
(3, 'PL', 3, '2015-05-14 17:23:52'),
(4, 'PE', 4, '2015-05-14 17:23:52');

-- --------------------------------------------------------

--
-- 테이블 구조 `wk_permission`
--

CREATE TABLE `wk_permission` (
  `idx` int(10) UNSIGNED NOT NULL COMMENT '고유값',
  `tmn` varchar(10) DEFAULT NULL COMMENT '상단메뉴',
  `lmn` varchar(10) DEFAULT NULL COMMENT '좌측메뉴',
  `users` text COMMENT '아이디',
  `u_level` varchar(100) DEFAULT NULL COMMENT '레벨',
  `sg_gb` varchar(10) DEFAULT NULL COMMENT '스키,골프구분'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `wk_permission`
--

INSERT INTO `wk_permission` (`idx`, `tmn`, `lmn`, `users`, `u_level`, `sg_gb`) VALUES
(1, '1', '0', ',', ',2,5,6,', 'ski'),
(2, '1', '0', ',', ',2,5,6,', 'golf'),
(3, '2', '0', ',', ',2,5,6,', 'golf'),
(4, '1', '1', ',', ',2,5,6,', 'ski'),
(5, '1', '2', ',', ',2,5,6,', 'ski'),
(6, '1', '3', ',', ',2,5,6,', 'ski'),
(7, '1', '4', ',', ',2,5,6,', 'ski'),
(8, '1', '5', ',', ',2,5,6,', 'ski'),
(9, '1', '6', ',', ',2,5,6,', 'ski'),
(10, '1', '7', ',', ',2,5,6,', 'ski'),
(11, '1', '8', ',', ',2,5,6,', 'ski'),
(12, '1', '9', ',', ',2,5,6,', 'ski'),
(13, '1', '10', ',', ',2,5,6,', 'ski'),
(14, '2', '0', ',', ',2,5,6,', 'ski'),
(15, '2', '1', ',', ',2,5,6,', 'ski'),
(67, '7', '5', ',', ',2,5,6,', 'golf'),
(16, '2', '2', ',', ',2,5,6,', 'ski'),
(65, '7', '3', ',', ',2,5,6,', 'golf'),
(66, '7', '4', ',', ',2,5,6,', 'golf'),
(17, '2', '3', ',', ',2,5,6,', 'ski'),
(63, '7', '1', ',', ',2,5,6,', 'golf'),
(64, '7', '2', ',', ',2,5,6,', 'golf'),
(18, '2', '4', ',', ',2,5,6,', 'ski'),
(61, '6', '0', ',', ',2,5,6,', 'golf'),
(62, '7', '0', ',', ',2,5,6,', 'golf'),
(19, '3', '0', ',', ',2,5,6,', 'ski'),
(59, '5', '2', ',', ',2,5,6,', 'golf'),
(60, '5', '3', ',', ',2,5,6,', 'golf'),
(20, '3', '1', ',', ',2,5,6,', 'ski'),
(57, '5', '0', ',', ',2,5,6,', 'golf'),
(58, '5', '1', ',', ',2,5,6,', 'golf'),
(21, '4', '0', ',', ',2,5,6,', 'ski'),
(55, '4', '1', ',', ',2,5,6,', 'golf'),
(56, '4', '2', ',', ',2,5,6,', 'golf'),
(22, '4', '1', ',', ',2,5,6,', 'ski'),
(53, '3', '1', ',', ',2,5,6,', 'golf'),
(54, '4', '0', ',', ',2,5,6,', 'golf'),
(23, '4', '2', ',', ',2,5,6,', 'ski'),
(51, '2', '3', ',', ',2,5,6,', 'golf'),
(52, '3', '0', ',', ',2,5,6,', 'golf'),
(24, '5', '0', ',wa5155,', ',2,5,', 'ski'),
(25, '5', '1', ',wa5155,', ',2,5,', 'ski'),
(26, '5', '2', ',wa5155,', ',2,5,', 'ski'),
(27, '5', '3', ',wa5155,', ',2,5,', 'ski'),
(28, '6', '0', ',', ',2,5,6,', 'ski'),
(49, '1', '10', ',', ',2,5,6,', 'golf'),
(50, '2', '2', ',', ',2,5,6,', 'golf'),
(29, '6', '1', ',', ',2,5,6,', 'ski'),
(47, '1', '8', ',', ',2,5,6,', 'golf'),
(48, '1', '9', ',', ',2,5,6,', 'golf'),
(30, '6', '2', ',', ',2,5,6,', 'ski'),
(45, '1', '6', ',', ',2,5,6,', 'golf'),
(46, '1', '7', ',', ',2,5,6,', 'golf'),
(31, '6', '3', ',', ',2,5,6,', 'ski'),
(43, '1', '4', ',', ',2,5,6,', 'golf'),
(44, '1', '5', ',', ',2,5,6,', 'golf'),
(32, '7', '0', ',', ',2,5,6,', 'ski'),
(39, '2', '1', ',', ',2,5,6,', 'golf'),
(40, '1', '1', ',', ',2,5,6,', 'golf'),
(33, '7', '1', ',', ',2,5,6,', 'ski'),
(34, '7', '2', ',', ',2,5,6,', 'ski'),
(37, '7', '4', ',', ',2,5,6,', 'ski'),
(38, '7', '5', ',', ',2,5,6,', 'ski'),
(35, '7', '3', ',wa5155,kdw0707,japanski,curimm,aran,imanara,goosry,', ',2,5,', 'ski'),
(36, '6', '4', ',', ',2,5,6,', 'ski'),
(41, '1', '2', ',', ',2,5,6,', 'golf'),
(42, '1', '3', ',', ',2,5,6,', 'golf'),
(68, '1', '0', ',', ',2,', 'ko'),
(69, '1', '1', ',', ',2,', 'ko'),
(70, '1', '2', ',', ',2,', 'ko');

-- --------------------------------------------------------

--
-- 테이블 구조 `wk_popup`
--

CREATE TABLE `wk_popup` (
  `idx` int(11) UNSIGNED NOT NULL,
  `start_day` date DEFAULT '0000-00-00' COMMENT '시작일',
  `end_day` date DEFAULT '0000-00-00' COMMENT '마감일',
  `subject` varchar(60) DEFAULT NULL COMMENT '제목',
  `width` mediumint(9) UNSIGNED DEFAULT NULL COMMENT '가로사이즈',
  `height` mediumint(9) UNSIGNED DEFAULT NULL COMMENT '세로사이즈',
  `topMargin` mediumint(9) UNSIGNED DEFAULT NULL COMMENT '상단패딩',
  `leftMargin` mediumint(9) UNSIGNED DEFAULT NULL COMMENT '왼쪽패딩',
  `view_ck` enum('Y','N') DEFAULT NULL COMMENT '노출여부',
  `pop_gb` enum('G','L') DEFAULT 'G' COMMENT '팝업구분',
  `url` varchar(255) DEFAULT NULL COMMENT '이동경로',
  `content` text COMMENT '내용',
  `cookie_ck` char(1) DEFAULT NULL COMMENT '쿠키설정',
  `sg_gb` varchar(10) DEFAULT NULL COMMENT '스키,골프구분',
  `modify_date` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '수정날짜',
  `reg_date` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '등록일'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `Pka_Admin`
--
ALTER TABLE `Pka_Admin`
  ADD PRIMARY KEY (`PAD_idx`),
  ADD KEY `PAD_idx` (`PAD_idx`);

--
-- 테이블의 인덱스 `Pka_Bookmark`
--
ALTER TABLE `Pka_Bookmark`
  ADD PRIMARY KEY (`PB_idx`),
  ADD KEY `PU_idx` (`PB_idx`);

--
-- 테이블의 인덱스 `Pka_Bookmark_comment`
--
ALTER TABLE `Pka_Bookmark_comment`
  ADD PRIMARY KEY (`PC_idx`),
  ADD KEY `PU_idx` (`PC_idx`);

--
-- 테이블의 인덱스 `Pka_Collection`
--
ALTER TABLE `Pka_Collection`
  ADD PRIMARY KEY (`PU_idx`),
  ADD KEY `PU_idx` (`PU_idx`);

--
-- 테이블의 인덱스 `Pka_like`
--
ALTER TABLE `Pka_like`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `Pka_Recommend`
--
ALTER TABLE `Pka_Recommend`
  ADD PRIMARY KEY (`PR_idx`),
  ADD KEY `PU_idx` (`PR_idx`);

--
-- 테이블의 인덱스 `Pka_User`
--
ALTER TABLE `Pka_User`
  ADD PRIMARY KEY (`PU_idx`),
  ADD KEY `PU_idx` (`PU_idx`);

--
-- 테이블의 인덱스 `wk_bbs_bookmark`
--
ALTER TABLE `wk_bbs_bookmark`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `wk_bbs_bookmark_comment`
--
ALTER TABLE `wk_bbs_bookmark_comment`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `wk_bbs_free`
--
ALTER TABLE `wk_bbs_free`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `wk_bbs_free_comment`
--
ALTER TABLE `wk_bbs_free_comment`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `wk_bbs_notice`
--
ALTER TABLE `wk_bbs_notice`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `wk_bbs_notice_comment`
--
ALTER TABLE `wk_bbs_notice_comment`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `wk_board_category`
--
ALTER TABLE `wk_board_category`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `wk_board_config`
--
ALTER TABLE `wk_board_config`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `wk_category`
--
ALTER TABLE `wk_category`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `wk_mb_position`
--
ALTER TABLE `wk_mb_position`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `wk_mb_rank`
--
ALTER TABLE `wk_mb_rank`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `wk_permission`
--
ALTER TABLE `wk_permission`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `wk_popup`
--
ALTER TABLE `wk_popup`
  ADD PRIMARY KEY (`idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `Pka_Admin`
--
ALTER TABLE `Pka_Admin`
  MODIFY `PAD_idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `Pka_Bookmark`
--
ALTER TABLE `Pka_Bookmark`
  MODIFY `PB_idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- 테이블의 AUTO_INCREMENT `Pka_Bookmark_comment`
--
ALTER TABLE `Pka_Bookmark_comment`
  MODIFY `PC_idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 테이블의 AUTO_INCREMENT `Pka_Collection`
--
ALTER TABLE `Pka_Collection`
  MODIFY `PU_idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 테이블의 AUTO_INCREMENT `Pka_like`
--
ALTER TABLE `Pka_like`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `Pka_Recommend`
--
ALTER TABLE `Pka_Recommend`
  MODIFY `PR_idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- 테이블의 AUTO_INCREMENT `Pka_User`
--
ALTER TABLE `Pka_User`
  MODIFY `PU_idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 테이블의 AUTO_INCREMENT `wk_bbs_bookmark`
--
ALTER TABLE `wk_bbs_bookmark`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `wk_bbs_bookmark_comment`
--
ALTER TABLE `wk_bbs_bookmark_comment`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- 테이블의 AUTO_INCREMENT `wk_bbs_free`
--
ALTER TABLE `wk_bbs_free`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `wk_bbs_free_comment`
--
ALTER TABLE `wk_bbs_free_comment`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- 테이블의 AUTO_INCREMENT `wk_bbs_notice`
--
ALTER TABLE `wk_bbs_notice`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `wk_bbs_notice_comment`
--
ALTER TABLE `wk_bbs_notice_comment`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `wk_board_category`
--
ALTER TABLE `wk_board_category`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- 테이블의 AUTO_INCREMENT `wk_board_config`
--
ALTER TABLE `wk_board_config`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- 테이블의 AUTO_INCREMENT `wk_category`
--
ALTER TABLE `wk_category`
  MODIFY `idx` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 테이블의 AUTO_INCREMENT `wk_mb_position`
--
ALTER TABLE `wk_mb_position`
  MODIFY `idx` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 테이블의 AUTO_INCREMENT `wk_mb_rank`
--
ALTER TABLE `wk_mb_rank`
  MODIFY `idx` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `wk_permission`
--
ALTER TABLE `wk_permission`
  MODIFY `idx` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '고유값', AUTO_INCREMENT=71;

--
-- 테이블의 AUTO_INCREMENT `wk_popup`
--
ALTER TABLE `wk_popup`
  MODIFY `idx` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
