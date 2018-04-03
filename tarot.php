<?php

/**
 * Plugin Name: Tarot
 */

class Tarot {

	public static function go() {
		add_action( 'admin_menu', array( __CLASS__, 'admin_menu' ) );
	}

	public static function admin_menu() {
		add_management_page( 'Tarot Test', 'tarot', 'manage_options', 'tarot', array( __CLASS__, 'print_deck' ) );
	}

	public static function print_deck() {
		wp_enqueue_style( 'tarot', plugins_url( 'tarot.css', __FILE__ ) );
		$deck = self::get_deck();

		?>
		<div class="tarot-spread three-card">
			<?php
			self::print_card( $deck['ARCANA-02-HIGH-PRIESTESS'], 'inverted' );
			self::print_card( $deck['ARCANA-13-DEATH'] );
			self::print_card( $deck['QUEEN-WANDS'] );
			?>
		</div>
		<?php
	}

	public static function print_card( $card, $classes = '' ) {
		?>
        <figure>
            <div class="tarot-card <?php echo esc_attr( $classes ); ?>">
                <img class="card-art" src="<?php echo esc_url( $card['image_url'] ); ?>" width="<?php echo intval( $card['width'] ); ?>" height="<?php echo intval( $card['height'] ); ?>" alt="<?php echo esc_attr( $card['unicode'] ); ?> -- <?php echo esc_attr( $card['suit'] ); ?> <?php echo esc_attr( $card['order'] ); ?>" />
            </div>
            <figcaption>
                <?php echo esc_html( $card['label'] ) . ( false !== strpos( $classes, 'inverted' ) ? ' ' . esc_html__( '(Inverted)' ) : '' ); ?>
            </figcaption>
        </figure>
		<?php

	}

	public static function get_deck() {
		// Heights range from 514px (Emperor + Tower) to 541px (Strength) but widths are a consistent 300px.
		$deck = array (
			'ARCANA-00-FOOL' => array(
				'unicode' => '🃠',
				'image'   => 'images/RWS_Tarot_00_Fool.jpg',
				'label'   => __( 'The Fool' ),
				'suit'    => __( 'Major Arcana' ),
				'order'   => 0,
				'width'   => 300,
				'height'  => 524,
			),
			'ARCANA-01-MAGICIAN' => array(
				'unicode' => '🃡',
				'image'   => 'images/RWS_Tarot_01_Magician.jpg',
				'label'   => __( 'The Magician' ),
				'suit'    => __( 'Major Arcana' ),
				'order'   => 1,
				'width'   => 300,
				'height'  => 528,
			),
			'ARCANA-02-HIGH-PRIESTESS' => array(
				'unicode' => '🃢',
				'image'   => 'images/RWS_Tarot_02_High_Priestess.jpg',
				'label'   => __( 'The High Priestess' ),
				'suit'    => __( 'Major Arcana' ),
				'order'   => 2,
				'width'   => 300,
				'height'  => 521,
			),
			'ARCANA-03-EMPRESS' => array(
				'unicode' => '🃣',
				'image'   => 'images/RWS_Tarot_03_Empress.jpg',
				'label'   => __( 'The Empress' ),
				'suit'    => __( 'Major Arcana' ),
				'order'   => 3,
				'width'   => 300,
				'height'  => 519,
			),
			'ARCANA-04-EMPEROR' => array(
				'unicode' => '🃤',
				'image'   => 'images/RWS_Tarot_04_Emperor.jpg',
				'label'   => __( 'The Emperor' ),
				'suit'    => __( 'Major Arcana' ),
				'order'   => 4,
				'width'   => 300,
				'height'  => 514,
			),
			'ARCANA-05-HEIROPHANT' => array(
				'unicode' => '🃥',
				'image'   => 'images/RWS_Tarot_05_Hierophant.jpg',
				'label'   => __( 'The Heirophant' ),
				'suit'    => __( 'Major Arcana' ),
				'order'   => 5,
				'width'   => 300,
				'height'  => 525,
			),
			'ARCANA-06-LOVERS' => array(
				'unicode' => '🃦',
				'image'   => 'images/RWS_Tarot_06_Lovers.jpg',
				'label'   => __( 'The Lovers' ),
				'suit'    => __( 'Major Arcana' ),
				'order'   => 6,
				'width'   => 300,
				'height'  => 518,
			),
			'ARCANA-07-CHARIOT' => array(
				'unicode' => '🃧',
				'image'   => 'images/RWS_Tarot_07_Chariot.jpg',
				'label'   => __( 'The Chariot' ),
				'suit'    => __( 'Major Arcana' ),
				'order'   => 7,
				'width'   => 300,
				'height'  => 529,
			),
			'ARCANA-08-STRENGTH' => array(
				'unicode' => '🃨',
				'image'   => 'images/RWS_Tarot_08_Strength.jpg',
				'label'   => __( 'Strength' ),
				'suit'    => __( 'Major Arcana' ),
				'order'   => 8,
				'width'   => 300,
				'height'  => 541,
			),
			'ARCANA-09-HERMIT' => array(
				'unicode' => '🃩',
				'image'   => 'images/RWS_Tarot_09_Hermit.jpg',
				'label'   => __( 'The Hermit' ),
				'suit'    => __( 'Major Arcana' ),
				'order'   => 9,
				'width'   => 300,
				'height'  => 519,
			),
			'ARCANA-10-WHEEL-OF-FORTUNE' => array(
				'unicode' => '🃪',
				'image'   => 'images/RWS_Tarot_10_Wheel_of_Fortune.jpg',
				'label'   => __( 'The Wheel of Fortune' ),
				'suit'    => __( 'Major Arcana' ),
				'order'   => 10,
				'width'   => 300,
				'height'  => 518,
			),
			'ARCANA-11-JUSTICE' => array(
				'unicode' => '🃫',
				'image'   => 'images/RWS_Tarot_11_Justice.jpg',
				'label'   => __( 'Justice' ),
				'suit'    => __( 'Major Arcana' ),
				'order'   => 11,
				'width'   => 300,
				'height'  => 522,
			),
			'ARCANA-12-HANGED-MAN' => array(
				'unicode' => '🃬',
				'image'   => 'images/RWS_Tarot_12_Hanged_Man.jpg',
				'label'   => __( 'The Hanged Man' ),
				'suit'    => __( 'Major Arcana' ),
				'order'   => 12,
				'width'   => 300,
				'height'  => 527,
			),
			'ARCANA-13-DEATH' => array(
				'unicode' => '🃭',
				'image'   => 'images/RWS_Tarot_13_Death.jpg',
				'label'   => __( 'Death' ),
				'suit'    => __( 'Major Arcana' ),
				'order'   => 13,
				'width'   => 300,
				'height'  => 528,
			),
			'ARCANA-14-TEMPERANCE' => array(
				'unicode' => '🃮',
				'image'   => 'images/RWS_Tarot_14_Temperance.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Major Arcana' ),
				'order'   => 14,
				'width'   => 300,
				'height'  => 521,
			),
			'ARCANA-15-DEVIL' => array(
				'unicode' => '🃯',
				'image'   => 'images/RWS_Tarot_15_Devil.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Major Arcana' ),
				'order'   => 15,
				'width'   => 300,
				'height'  => 523,
			),
			'ARCANA-16-TOWER' => array(
				'unicode' => '🃰',
				'image'   => 'images/RWS_Tarot_16_Tower.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Major Arcana' ),
				'order'   => 16,
				'width'   => 300,
				'height'  => 514,
			),
			'ARCANA-17-STAR' => array(
				'unicode' => '🃱',
				'image'   => 'images/RWS_Tarot_17_Star.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Major Arcana' ),
				'order'   => 17,
				'width'   => 300,
				'height'  => 517,
			),
			'ARCANA-18-MOON' => array(
				'unicode' => '🃲',
				'image'   => 'images/RWS_Tarot_18_Moon.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Major Arcana' ),
				'order'   => 18,
				'width'   => 300,
				'height'  => 528,
			),
			'ARCANA-19-SUN' => array(
				'unicode' => '🃳',
				'image'   => 'images/RWS_Tarot_19_Sun.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Major Arcana' ),
				'order'   => 19,
				'width'   => 300,
				'height'  => 518,
			),
			'ARCANA-20-JUDGEMENT' => array(
				'unicode' => '🃴',
				'image'   => 'images/RWS_Tarot_20_Judgement.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Major Arcana' ),
				'order'   => 20,
				'width'   => 300,
				'height'  => 518,
			),
			'ARCANA-21-WORLD' => array(
				'unicode' => '🃵',
				'image'   => 'images/RWS_Tarot_21_World.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Major Arcana' ),
				'order'   => 21,
				'width'   => 300,
				'height'  => 525,
			),
			// wands = clubs
			'ACE-WANDS' => array(
				'unicode' => '🃑',
				'image'   => 'images/Wands01.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Wands' ),
				'order'   => 1,
				'width'   => 300,
				'height'  => 523,
			),
			'TWO-WANDS' => array(
				'unicode' => '🃒',
				'image'   => 'images/Wands02.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Wands' ),
				'order'   => 2,
				'width'   => 300,
				'height'  => 521,
			),
			'THREE-WANDS' => array(
				'unicode' => '🃓',
				'image'   => 'images/Wands03.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Wands' ),
				'order'   => 3,
				'width'   => 300,
				'height'  => 530,
			),
			'FOUR-WANDS' => array(
				'unicode' => '🃔',
				'image'   => 'images/Wands04.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Wands' ),
				'order'   => 4,
				'width'   => 300,
				'height'  => 527,
			),
			'FIVE-WANDS' => array(
				'unicode' => '🃕',
				'image'   => 'images/Wands05.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Wands' ),
				'order'   => 5,
				'width'   => 300,
				'height'  => 526,
			),
			'SIX-WANDS' => array(
				'unicode' => '🃖',
				'image'   => 'images/Wands06.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Wands' ),
				'order'   => 6,
				'width'   => 300,
				'height'  => 520,
			),
			'SEVEN-WANDS' => array(
				'unicode' => '🃗',
				'image'   => 'images/Wands07.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Wands' ),
				'order'   => 7,
				'width'   => 300,
				'height'  => 529,
			),
			'EIGHT-WANDS' => array(
				'unicode' => '🃘',
				'image'   => 'images/Wands08.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Wands' ),
				'order'   => 8,
				'width'   => 300,
				'height'  => 530,
			),
			'NINE-WANDS' => array(
				'unicode' => '🃙',
				'image'   => 'images/Wands09.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Wands' ),
				'order'   => 9,
				'width'   => 300,
				'height'  => 522,
			),
			'TEN-WANDS' => array(
				'unicode' => '🃚',
				'image'   => 'images/Wands10.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Wands' ),
				'order'   => 10,
				'width'   => 300,
				'height'  => 517,
			),
			'PAGE-WANDS' => array(
				'unicode' => '🃛',
				'image'   => 'images/Wands11.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Wands' ),
				'order'   => 11,
				'width'   => 300,
				'height'  => 527,
			),
			'KNIGHT-WANDS' => array(
				'unicode' => '🃜',
				'image'   => 'images/Wands12.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Wands' ),
				'order'   => 12,
				'width'   => 300,
				'height'  => 527,
			),
			'QUEEN-WANDS' => array(
				'unicode' => '🃝',
				'image'   => 'images/Wands13.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Wands' ),
				'order'   => 13,
				'width'   => 300,
				'height'  => 523,
			),
			'KING-WANDS' => array(
				'unicode' => '🃞',
				'image'   => 'images/Wands14.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Wands' ),
				'order'   => 14,
				'width'   => 300,
				'height'  => 534,
			),
			// pentacles = diamonds
			'ACE-PENTACLES' => array(
				'unicode' => '🃁',
				'image'   => 'images/Pents01.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Pentacles' ),
				'order'   => 1,
				'width'   => 300,
				'height'  => 526,
			),
			'TWO-PENTACLES' => array(
				'unicode' => '🃂',
				'image'   => 'images/Pents02.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Pentacles' ),
				'order'   => 2,
				'width'   => 300,
				'height'  => 521,
			),
			'THREE-PENTACLES' => array(
				'unicode' => '🃃',
				'image'   => 'images/Pents03.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Pentacles' ),
				'order'   => 3,
				'width'   => 300,
				'height'  => 523,
			),
			'FOUR-PENTACLES' => array(
				'unicode' => '🃄',
				'image'   => 'images/Pents04.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Pentacles' ),
				'order'   => 4,
				'width'   => 300,
				'height'  => 530,
			),
			'FIVE-PENTACLES' => array(
				'unicode' => '🃅',
				'image'   => 'images/Pents05.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Pentacles' ),
				'order'   => 5,
				'width'   => 300,
				'height'  => 524,
			),
			'SIX-PENTACLES' => array(
				'unicode' => '🃆',
				'image'   => 'images/Pents06.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Pentacles' ),
				'order'   => 6,
				'width'   => 300,
				'height'  => 521,
			),
			'SEVEN-PENTACLES' => array(
				'unicode' => '🃇',
				'image'   => 'images/Pents07.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Pentacles' ),
				'order'   => 7,
				'width'   => 300,
				'height'  => 528,
			),
			'EIGHT-PENTACLES' => array(
				'unicode' => '🃈',
				'image'   => 'images/Pents08.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Pentacles' ),
				'order'   => 8,
				'width'   => 300,
				'height'  => 524,
			),
			'NINE-PENTACLES' => array(
				'unicode' => '🃉',
				'image'   => 'images/Pents09.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Pentacles' ),
				'order'   => 9,
				'width'   => 300,
				'height'  => 523,
			),
			'TEN-PENTACLES' => array(
				'unicode' => '🃊',
				'image'   => 'images/Pents10.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Pentacles' ),
				'order'   => 10,
				'width'   => 300,
				'height'  => 516,
			),
			'PAGE-PENTACLES' => array(
				'unicode' => '🃋',
				'image'   => 'images/Pents11.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Pentacles' ),
				'order'   => 11,
				'width'   => 300,
				'height'  => 526,
			),
			'KNIGHT-PENTACLES' => array(
				'unicode' => '🃌',
				'image'   => 'images/Pents12.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Pentacles' ),
				'order'   => 12,
				'width'   => 300,
				'height'  => 527,
			),
			'QUEEN-PENTACLES' => array(
				'unicode' => '🃍',
				'image'   => 'images/Pents13.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Pentacles' ),
				'order'   => 13,
				'width'   => 300,
				'height'  => 527,
			),
			'KING-PENTACLES' => array(
				'unicode' => '🃎',
				'image'   => 'images/Pents14.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Pentacles' ),
				'order'   => 14,
				'width'   => 300,
				'height'  => 522,
			),
			// cups = hearts
			'ACE-CUPS' => array(
				'unicode' => '🂱',
				'image'   => 'images/Cups01.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Cups' ),
				'order'   => 1,
				'width'   => 300,
				'height'  => 537,
			),
			'TWO-CUPS' => array(
				'unicode' => '🂲',
				'image'   => 'images/Cups02.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Cups' ),
				'order'   => 2,
				'width'   => 300,
				'height'  => 531,
			),
			'THREE-CUPS' => array(
				'unicode' => '🂳',
				'image'   => 'images/Cups03.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Cups' ),
				'order'   => 3,
				'width'   => 300,
				'height'  => 530,
			),
			'FOUR-CUPS' => array(
				'unicode' => '🂴',
				'image'   => 'images/Cups04.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Cups' ),
				'order'   => 4,
				'width'   => 300,
				'height'  => 526,
			),
			'FIVE-CUPS' => array(
				'unicode' => '🂵',
				'image'   => 'images/Cups05.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Cups' ),
				'order'   => 5,
				'width'   => 300,
				'height'  => 537,
			),
			'SIX-CUPS' => array(
				'unicode' => '🂶',
				'image'   => 'images/Cups06.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Cups' ),
				'order'   => 6,
				'width'   => 300,
				'height'  => 532,
			),
			'SEVEN-CUPS' => array(
				'unicode' => '🂷',
				'image'   => 'images/Cups07.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Cups' ),
				'order'   => 7,
				'width'   => 300,
				'height'  => 524,
			),
			'EIGHT-CUPS' => array(
				'unicode' => '🂸',
				'image'   => 'images/Cups08.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Cups' ),
				'order'   => 8,
				'width'   => 300,
				'height'  => 526,
			),
			'NINE-CUPS' => array(
				'unicode' => '🂹	',
				'image'   => 'images/Cups09.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Cups' ),
				'order'   => 9,
				'width'   => 300,
				'height'  => 529,
			),
			'TEN-CUPS' => array(
				'unicode' => '🂺',
				'image'   => 'images/Cups10.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Cups' ),
				'order'   => 10,
				'width'   => 300,
				'height'  => 527,
			),
			'PAGE-CUPS' => array(
				'unicode' => '🂻',
				'image'   => 'images/Cups11.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Cups' ),
				'order'   => 11,
				'width'   => 300,
				'height'  => 535,
			),
			'KNIGHT-CUPS' => array(
				'unicode' => '🂼',
				'image'   => 'images/Cups12.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Cups' ),
				'order'   => 12,
				'width'   => 300,
				'height'  => 517,
			),
			'QUEEN-CUPS' => array(
				'unicode' => '🂽',
				'image'   => 'images/Cups13.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Cups' ),
				'order'   => 13,
				'width'   => 300,
				'height'  => 519,
			),
			'KING-CUPS' => array(
				'unicode' => '🂾',
				'image'   => 'images/Cups14.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Cups' ),
				'order'   => 14,
				'width'   => 300,
				'height'  => 530,
			),
			// swords = spades
			'ACE-SWORDS' => array(
				'unicode' => '🂡',
				'image'   => 'images/Swords01.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Swords' ),
				'order'   => 1,
				'width'   => 300,
				'height'  => 526,
			),
			'TWO-SWORDS' => array(
				'unicode' => '🂢',
				'image'   => 'images/Swords02.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Swords' ),
				'order'   => 2,
				'width'   => 300,
				'height'  => 521,
			),
			'THREE-SWORDS' => array(
				'unicode' => '🂣',
				'image'   => 'images/Swords03.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Swords' ),
				'order'   => 3,
				'width'   => 300,
				'height'  => 533,
			),
			'FOUR-SWORDS' => array(
				'unicode' => '🂤',
				'image'   => 'images/Swords04.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Swords' ),
				'order'   => 4,
				'width'   => 300,
				'height'  => 534,
			),
			'FIVE-SWORDS' => array(
				'unicode' => '🂥',
				'image'   => 'images/Swords05.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Swords' ),
				'order'   => 5,
				'width'   => 300,
				'height'  => 527,
			),
			'SIX-SWORDS' => array(
				'unicode' => '🂦',
				'image'   => 'images/Swords06.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Swords' ),
				'order'   => 6,
				'width'   => 300,
				'height'  => 518,
			),
			'SEVEN-SWORDS' => array(
				'unicode' => '🂧',
				'image'   => 'images/Swords07.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Swords' ),
				'order'   => 7,
				'width'   => 300,
				'height'  => 521,
			),
			'EIGHT-SWORDS' => array(
				'unicode' => '🂨',
				'image'   => 'images/Swords08.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Swords' ),
				'order'   => 8,
				'width'   => 300,
				'height'  => 518,
			),
			'NINE-SWORDS' => array(
				'unicode' => '🂩',
				'image'   => 'images/Swords09.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Swords' ),
				'order'   => 9,
				'width'   => 300,
				'height'  => 522,
			),
			'TEN-SWORDS' => array(
				'unicode' => '🂪',
				'image'   => 'images/Swords10.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Swords' ),
				'order'   => 10,
				'width'   => 300,
				'height'  => 518,
			),
			'PAGE-SWORDS' => array(
				'unicode' => '🂫',
				'image'   => 'images/Swords11.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Swords' ),
				'order'   => 11,
				'width'   => 300,
				'height'  => 525,
			),
			'KNIGHT-SWORDS' => array(
				'unicode' => '🂬	',
				'image'   => 'images/Swords12.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Swords' ),
				'order'   => 12,
				'width'   => 300,
				'height'  => 524,
				),
			'QUEEN-SWORDS' => array(
				'unicode' => '🂭',
				'image'   => 'images/Swords13.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Swords' ),
				'order'   => 13,
				'width'   => 300,
				'height'  => 535,
				),
			'KING-SWORDS' => array(
				'unicode' => '🂮',
				'image'   => 'images/Swords14.jpg',
				'label'   => __( '' ),
				'suit'    => __( 'Swords' ),
				'order'   => 14,
				'width'   => 300,
				'height'  => 526,
				),
		);

		foreach ( $deck as $card => $definition ) {
			$deck[ $card ]['image_url'] = plugins_url( $definition['image'], __FILE__ );
		}

		return apply_filters( 'tarot_get_deck', $deck );
	}
}

Tarot::go();