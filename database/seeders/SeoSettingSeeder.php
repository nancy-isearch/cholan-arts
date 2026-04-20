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
    }
}
