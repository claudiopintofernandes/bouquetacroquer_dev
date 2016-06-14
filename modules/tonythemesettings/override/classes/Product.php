<?php

class Product extends ProductCore
{
	public static function getProductProperties($id_lang, $row, Context $context = null)
	{
		$get_rating = false;
		if (Module::isInstalled('productcomments') && Module::isEnabled('productcomments'))
		{
			include_once(_PS_MODULE_DIR_.'productcomments/ProductComment.php');
			$get_rating = true;
		}

		$product = ProductCore::getProductProperties($id_lang, $row, $context);
		$images = Image::getImages($id_lang, $product['id_product']);
		$product['tony_images'] = array();

		foreach ($images as $image)
		{
			$product['tony_images'][] = $image;
			if ($get_rating)
			{
				$rat = ProductComment::getAverageGrade($product['id_product']);
				$product['rating'] = $rat['grade'];
			}
			else
				$product['rating'] = -1;
		}

		return $product;
	}
}
 