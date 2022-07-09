<?php

use \Yoast\WP\SEO\Generators\Schema\Abstract_Schema_Piece;

class Schema_OrganizationDetails extends Abstract_Schema_Piece {
	/**
	 * Determines whether a piece should be added to the graph.
	 * We show it on all pages
	 *
	 * @return bool
	 */
	public function is_needed() {
		return true;
	}

	/**
	 * @return array $graph Schema markup
	 */
	public function generate() {

		$data = $this->build_organization_data();

		return $data;
	}

	/**
	 * @return array An array of Schema data.
	 */
	protected function build_organization_data() {

		$wpseo_titles = get_option( 'wpseo_titles' );
		if ( ! $wpseo_titles ) {
			return array();
		}
		$wpseo_social = get_option( 'wpseo_social' );

		if ( $wpseo_social ) {
			$social_links = array();
			if ( array_key_exists( 'twitter_site', $wpseo_social ) && $wpseo_social['twitter_site'] ) {
				$social_links[] = 'https://twitter.com/' . $wpseo_social['twitter_site'];
			}
			if ( array_key_exists( 'facebook_site', $wpseo_social ) && $wpseo_social['facebook_site'] ) {
				$social_links[] = '"' . $wpseo_social['facebook_site'] . '"';
			}
			if ( array_key_exists( 'other_social_urls', $wpseo_social ) && ! empty( $wpseo_social['other_social_urls'] ) ) {
				foreach ( $wpseo_social['other_social_urls'] as $url ) {
					$social_links[] = $url;
				}
			}
		}

		$data = array(
			'@type' => 'Organization',
			'@id'   => $this->context->canonical . '#organization_details',
			'url'   => $this->context->canonical,
			'name'  => $wpseo_titles['company_name'],
			'logo'  => $wpseo_titles['company_logo']
		);


		if ( ! empty( $social_links ) ) {
			$data['sameAs'] = $social_links;
		}

		return $data;

	}

}
