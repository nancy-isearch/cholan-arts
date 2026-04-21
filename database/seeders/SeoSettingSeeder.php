<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SeoSetting;

class SeoSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SeoSetting::updateOrCreate(
            ['page_key' => 'about'],
            [
                'meta_title' => 'About Us | Cholan Arts - Authentic South Indian Handicrafts',
                'meta_description' => 'Learn about Cholan Arts, a trusted destination for authentic South Indian handicrafts, traditional sculptures, and artistic creations crafted with heritage and precision.',
                'meta_keywords' => 'Cholan Arts, about Cholan Arts, Indian handicrafts, South Indian art, traditional sculptures, bronze statues, handcrafted art India',
                'index_page' => true,
                'schema_json' => json_encode([
                    "@context" => "https://schema.org",
                    "@type" => "AboutPage",
                    "name" => "About Cholan Arts",
                    "url" => "https://www.cholanarts.com/about-us",
                    "description" => "Learn about Cholan Arts and its journey in preserving traditional South Indian handicrafts.",
                    "publisher" => [
                        "@type" => "Organization",
                        "name" => "Cholan Arts",
                        "logo" => [
                            "@type" => "ImageObject",
                            "url" => "https://www.cholanarts.com/logo.png"
                        ]
                    ]
                ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
            ]
        );

        SeoSetting::updateOrCreate(
            ['page_key' => 'contact'],
            [
                'meta_title' => 'Contact Us | Cholan Arts - Get in Touch',
                'meta_description' => 'Contact Cholan Arts for inquiries about traditional South Indian handicrafts, custom sculptures, and orders. Reach out via phone, email, or visit us.',
                'meta_keywords' => 'contact Cholan Arts, Cholan Arts contact, handicrafts contact India, sculpture inquiries, art store contact',
                'index_page' => true,
                'schema_json' => json_encode([
                    "@context" => "https://schema.org",
                    "@type" => "LocalBusiness",
                    "name" => "Cholan Arts",
                    "url" => "https://www.cholanarts.com/contact-us",
                    "image" => "https://www.cholanarts.com/logo.png",
                    "description" => "Cholan Arts offers authentic South Indian handicrafts and traditional sculptures.",
                    "address" => [
                        "@type" => "PostalAddress",
                        "streetAddress" => "Your Street Address",
                        "addressLocality" => "Your City",
                        "addressRegion" => "Your State",
                        "postalCode" => "Your PIN Code",
                        "addressCountry" => "IN"
                    ],
                    "contactPoint" => [
                        "@type" => "ContactPoint",
                        "telephone" => "+91-XXXXXXXXXX",
                        "contactType" => "customer service",
                        "areaServed" => "IN",
                        "availableLanguage" => ["English", "Hindi"]
                    ],
                    "sameAs" => [
                        "https://facebook.com/yourpage",
                        "https://instagram.com/yourpage"
                    ]
                ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
            ]
        );

        SeoSetting::updateOrCreate(
            ['page_key' => 'product_list'],
            [
                'meta_title' => 'All Products | Cholan Arts - Traditional Indian Sculptures & Handicrafts',
                'meta_description' => 'Explore our complete collection of traditional South Indian sculptures, bronze idols, and handcrafted artworks at Cholan Arts. Authentic craftsmanship with timeless beauty.',
                'meta_keywords' => 'Cholan Arts products, Indian sculptures, bronze idols, handicrafts India, traditional art collection, buy sculptures online',
                'index_page' => true,
                'schema_json' => json_encode([
                    "@context" => "https://schema.org",
                    "@type" => "CollectionPage",
                    "name" => "Cholan Arts Product Collection",
                    "url" => "https://www.cholanarts.com/products",
                    "description" => "Browse all traditional South Indian handicrafts, bronze statues, and sculptures available at Cholan Arts.",
                    "mainEntity" => [
                        "@type" => "ItemList",
                        "name" => "Product List",
                        "numberOfItems" => 100, // optional: update dynamically later
                        "itemListElement" => [
                            [
                                "@type" => "ListItem",
                                "position" => 1,
                                "url" => "https://www.cholanarts.com/products"
                            ]
                        ]
                    ]
                ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
            ]
        );

        SeoSetting::updateOrCreate(
            ['page_key' => 'categories'],
            [
                'meta_title' => 'Browse Categories | Cholan Arts - Traditional Sculptures & Handcrafted Art',
                'meta_description' => 'Explore categories of authentic South Indian handicrafts, bronze idols, sculptures, and traditional artworks at Cholan Arts. Discover timeless craftsmanship by category.',
                'meta_keywords' => 'Cholan Arts categories, sculpture categories, bronze idols categories, handicrafts India categories, traditional art collections',

                'index_page' => true,

                'schema_json' => json_encode([
                    "@context" => "https://schema.org",
                    "@type" => "CollectionPage",

                    "name" => "Cholan Arts Categories",
                    "url" => "https://www.cholanarts.com/categories",
                    "description" => "Browse product categories of traditional South Indian handicrafts, bronze statues, and sculptures at Cholan Arts.",

                    "mainEntity" => [
                        "@type" => "ItemList",
                        "name" => "Product Categories",
                        "numberOfItems" => 10, // ⚠️ update dynamically later

                        "itemListElement" => [
                            [
                                "@type" => "ListItem",
                                "position" => 1,
                                "name" => "Bronze Sculptures",
                                "url" => "https://www.cholanarts.com/categories/bronze-sculptures"
                            ],
                            [
                                "@type" => "ListItem",
                                "position" => 2,
                                "name" => "Brass Idols",
                                "url" => "https://www.cholanarts.com/categories/brass-idols"
                            ],
                            [
                                "@type" => "ListItem",
                                "position" => 3,
                                "name" => "Handcrafted Artworks",
                                "url" => "https://www.cholanarts.com/categories/handcrafted-artworks"
                            ]
                        ]
                    ]
                ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
            ]
        );

        SeoSetting::updateOrCreate(
            ['page_key' => 'collections'],
            [
                'meta_title' => 'Explore Collections | Cholan Arts - Curated Traditional Art & Sculptures',
                'meta_description' => 'Discover curated collections of traditional South Indian sculptures, bronze idols, and handcrafted masterpieces at Cholan Arts. Handpicked themes with timeless artistry.',
                'meta_keywords' => 'Cholan Arts collections, sculpture collections, bronze idols collection, curated handicrafts India, traditional art themes',

                'index_page' => true,

                'schema_json' => json_encode([
                    "@context" => "https://schema.org",
                    "@type" => "CollectionPage",

                    "name" => "Cholan Arts Collections",
                    "url" => "https://www.cholanarts.com/collections",
                    "description" => "Explore curated collections of traditional South Indian handicrafts, bronze sculptures, and artistic masterpieces at Cholan Arts.",

                    "mainEntity" => [
                        "@type" => "ItemList",
                        "name" => "Collections List",
                        "numberOfItems" => 8, // ⚠️ update dynamically later

                        "itemListElement" => [
                            [
                                "@type" => "ListItem",
                                "position" => 1,
                                "name" => "Temple Sculptures Collection",
                                "url" => "https://www.cholanarts.com/collections/temple-sculptures"
                            ],
                            [
                                "@type" => "ListItem",
                                "position" => 2,
                                "name" => "Home Decor Collection",
                                "url" => "https://www.cholanarts.com/collections/home-decor"
                            ],
                            [
                                "@type" => "ListItem",
                                "position" => 3,
                                "name" => "Spiritual Idols Collection",
                                "url" => "https://www.cholanarts.com/collections/spiritual-idols"
                            ]
                        ]
                    ]
                ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
            ]
        );
    }
}
