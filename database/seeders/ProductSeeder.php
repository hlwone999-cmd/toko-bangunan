<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Semen Portland 50kg',
                'slug' => 'semen-portland-50kg',
                'sku' => 'CEM-PTL-50K-01',
                'description' => 'Premium quality Type I Portland cement, ideal for general construction, masonry, and reinforced concrete applications requiring high compressive strength.',
                'category' => 'Building Materials',
                'brand' => 'Semen Indonesia',
                'price' => 65000,
                'price_display' => 'Rp 65.000',
                'unit' => 'sak',
                'stock_status' => 'in_stock',
                'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDRLnSpDCPPpDiH62Z0-E13M79V6IYRZ2UrlgukfUIvzb2CcrAYiPq4tnu7JlThJynfFj6K30q10kfhw_dTTq4VmE5EpLJ-UCDEd6JO_EDNR8asTbYqwdAM7BvLwO5cu58405LnPc5n4-U4iOLnM2vF2_Ep2UwHwjoWmtXd8TZHrj3-8bj7mNiVO1kvnS6AqRlE3hFxFYyAvj9PHdREXARyCQyE1ACyhtkcXf1EfFhkOa-j2fwQfsLeqQ',
                'images' => [
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuB5K8mD7vSucVDyxQkwmcJzA1g6SD_wHiR7fgcTaSKp1mCtJDujPw4mZXA9PJ0SQ90WwNnFx_0aXWmBeFYmI1NUqLZVpfdVcDQ0mVV2EA6oohkhwh-jB9_Csrrjyb5a9ErmTFG87E1SiAJmrhGHKSi0WpCMFkUrB-CyCOveqVsgNDAOsvwWt6rEpI6LIpF_eDGBSBM8vsBZlX-IhT_SX4HGMio7pKQomET49QlQHIE6uze6pnowT1xVJw',
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuA9IL4nNwzBwEYQsCZaX2mOtC_QLQBlYbGWPaf6iRUvNapezRE9_xGXsDY76dau5Hv7WKQAdiekYA8d5fA21ohmjNAhvCetByQizo_xT573aQcKRXMcSFxAE3tOKGR6wNL1mB0AGMb3WD92wJvm-uivt9VSH4MY3sK2M97jNXbQPPuOm5Yrw4kWjAAHGC7vZhnX6EKVzeqWq_-Uo0qwnqMwqc4XfjS15S4oh0_Sl_A-JtAcYUMfjKHAAg',
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuCi4hWPBPi2gfcWA2oC7XTUnnaNcwzc7H79BXLFs6870z8ic7WWm3CwRKY89EHRzOB7j8lbGbpeYOrOVU7unnAse2snzwjJxTZ8qHrQzY2r-kLJK_-gEMtHcd4AWw275uCCsGg3abj4XsD2zv3h6UYRfpFAS-RhSrO6q7eIsRL_V-9J2P8FK2Efmns3A4TfvT2o7tibi4PAA6mn1zFqLpgvTiaOBWnWAUp4b8Mh0YhGhCE5oaTa9YQhDA',
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuCi-HDFZv9DJjm-lwwdBwqTSA2WFDygK0cHgrOpPI_RNZdzlb3m2xrbSbFaE12-YlET4xZbtF9a8i4Uljt5kiSWF5DQ-wr7pyA4tA2QoUDcZydF-iJxuJz4BSxalcWlTH0zP15YFFJ8AUWfqQQhcZbIocYGPlDELpHqK7XSO1nlLfudf6Qwj2JhZZ4JLnr8D2JzVBIwPARJGoZDgbWtzspYcccy139ID5h87pTRsKaPFPH_J0CqiSvEYg',
                ],
                'specifications' => [
                    ['label' => 'Weight', 'value' => '50 KG (± 0.5 KG)'],
                    ['label' => 'Type', 'value' => 'PORTLAND CEMENT TYPE I (OPC)'],
                    ['label' => 'Compressive Strength (28 Days)', 'value' => '> 40 MPa (SNI 15-2049-2004 Standard)'],
                    ['label' => 'Primary Usage', 'value' => 'STRUCTURAL CONCRETE, FOUNDATIONS, BEAMS, COLUMNS, MASONRY MORTAR'],
                    ['label' => 'Storage Recommendations', 'value' => 'STORE IN DRY, VENTILATED AREA ON PALLETS. AVOID DIRECT GROUND CONTACT.'],
                ],
            ],
            [
                'name' => 'Baja Ringan 6m',
                'slug' => 'baja-ringan-6m',
                'sku' => 'STL-BR-06',
                'description' => 'Baja ringan berkualitas tinggi untuk rangka atap. Tahan karat dan ringan, ideal untuk proyek residensial dan komersial.',
                'category' => 'Building Materials',
                'brand' => 'Roman Ceramics',
                'price' => 85000,
                'price_display' => 'Rp 85.000',
                'unit' => 'batang',
                'stock_status' => 'in_stock',
                'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBA1AH-Zs4y55Xp-D7hyoCRgq7MydXfvgDDvL-nCwDFOt8Aoj0oOWwfvbZS4aW6lHHcWyHXXE5NAAcrXZ8Rmi38nzhn6xtap57VYTDRp72B4AtkUqi_Daqa71znJ292G38NutDswlLov2k7qEbUG1ZhEZLlsEg-wYS3v-EPsawY6OXTUaA9t8fN7I-7MvfBYVVyTAOldsHesmG1jW0SAeuSW-xb2bypUcxkFNqd9g834B-8BuacaafSDw',
                'images' => [],
                'specifications' => [
                    ['label' => 'Length', 'value' => '6 METER'],
                    ['label' => 'Material', 'value' => 'GALVANIZED STEEL (G550 AZ150)'],
                    ['label' => 'Thickness', 'value' => '0.75mm'],
                    ['label' => 'Usage', 'value' => 'ROOF TRUSS, CEILING FRAME, PURLIN'],
                ],
            ],
            [
                'name' => 'Cat Tembok Pro 25kg',
                'slug' => 'cat-tembok-pro-25kg',
                'sku' => 'PNT-WLL-25',
                'description' => 'Cat tembok premium anti-bakteri dengan daya tutup tinggi. Cocok untuk interior dan eksterior, menghasilkan finishing halus dan tahan lama.',
                'category' => 'Paint & Finishes',
                'brand' => 'Dulux',
                'price' => 1250000,
                'price_display' => 'Rp 1.250.000',
                'unit' => 'pail',
                'stock_status' => 'low_stock',
                'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDdw-l09urwcDsPkR6M2mwmvmI1JCF9fNB5Nake9zYMK7afLWObgUKqd3BDr5KPVShPmayLBa0pek26vTyRvDMKcSbfMetEs35GW6EI7smmZnogHNG2J9Wz4wsYGDurGP9QVi8lhLpi20n6vKWJckfwBt0lq3fPEq2zpAe5BaOAH-udoC_5RmqoNdHmyeRgukulXo82IpK_YPbSzMvoPQC-p-y5B1c1N5PADKjJyuUFrbskuIXrIoAL0w',
                'images' => [],
                'specifications' => [
                    ['label' => 'Weight', 'value' => '25 KG'],
                    ['label' => 'Type', 'value' => 'ANTI-BACTERIAL EMULSION PAINT'],
                    ['label' => 'Coverage', 'value' => '12-14 m²/LITER PER COAT'],
                    ['label' => 'Finish', 'value' => 'MATTE / EGGSHELL'],
                ],
            ],
            [
                'name' => 'Keramik Lantai 60x60',
                'slug' => 'keramik-lantai-60x60',
                'sku' => 'TLE-FLR-60',
                'description' => 'Keramik lantai homogeneous dengan tekstur batu alam. Tahan gores dan anti-slip, cocok untuk area komersial dan residensial bertaraf tinggi.',
                'category' => 'Building Materials',
                'brand' => 'Roman Ceramics',
                'price' => 120000,
                'price_display' => 'Rp 120.000 / box',
                'unit' => 'box',
                'stock_status' => 'special_order',
                'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBAJtq-JGwU69I_R-c1ekjKwkYCzwIqsa8H194ndM9GkpRH66oWvNqxG5XRaY-vQJJEqTg9ISHTX8000yKtUW3SdS7T-T5NFfIvWebYn4IYRD9-KMAlgNopOtw5KUzgr9CH18RXE_OUU32MH5MssQFdVb_w8vwetfdCqufOKZOlLHCAmo7k9vhDYyJNQmbX8G_J-JcZE0jhAYYQrDZLGqbV7VQTj4_dPXbejVhqzIdhxj6Di1tWrjiQxw',
                'images' => [],
                'specifications' => [
                    ['label' => 'Size', 'value' => '60cm x 60cm'],
                    ['label' => 'Material', 'value' => 'HOMOGENOUS PORCELAIN TILE'],
                    ['label' => 'Pieces per Box', 'value' => '4 PCS'],
                    ['label' => 'Surface', 'value' => 'MATTE NATURAL STONE TEXTURE'],
                ],
            ],
            [
                'name' => 'Professional Masonry Trowel 9"',
                'slug' => 'professional-masonry-trowel-9',
                'sku' => 'TRW-STL-09',
                'description' => 'Semen mortar trowel profesional dengan pisau baja anti-karat dan gagang kayu yang nyaman.',
                'category' => 'Tools & Equipment',
                'brand' => 'Semen Indonesia',
                'price' => 135000,
                'price_display' => 'Rp 135.000',
                'unit' => 'unit',
                'stock_status' => 'in_stock',
                'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDC2amkT6bDdwJ6OH2fmp2Dkht-80bcTxaLnHI2m9PjLDBo4LGsFAqpT7ND5T8nTRML5dQVvaxQ-wuGbt8ItWoYUyHuAFuQLhzUmjZgeeL1uep0ooxG8P-MbDQRXCsFK1KTZ-8HMWZani6Sw59VvViWp9Z3hZ09fbcsfw7kT63tgTZbqHDFlZSkoqWJ11FSKyrWWHZW0mkPoIYKV_LXksxTBqnGYbQAuTDcM_IPNAdw7kAOypdjJcoLQg',
                'images' => [],
                'specifications' => [
                    ['label' => 'Blade Width', 'value' => '9 INCHES'],
                    ['label' => 'Material', 'value' => 'CARBON STEEL, RUBBERIZED HANDLE'],
                ],
            ],
            [
                'name' => 'Heavy Duty Contractor Wheelbarrow',
                'slug' => 'heavy-duty-contractor-wheelbarrow',
                'sku' => 'WHL-BRW-HD',
                'description' => 'Gerobak dorong kontraktor berat dengan bak baja cat kuning dan ban pneumatik tahan lama.',
                'category' => 'Tools & Equipment',
                'brand' => 'Dulux',
                'price' => 1350000,
                'price_display' => 'Rp 1.350.000',
                'unit' => 'unit',
                'stock_status' => 'in_stock',
                'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAdgCJPrU41NooDJqtQCxrMxoArG3Ecg36C6WegO33EShFJXQA2KlY1Y6zucJvzSEbcsSk7j5qFntFWxaak89V2QJWIKnjsUcKjZJRro8E_iBDDbr9aDoYwiMOZ03jWx_VjCBV8k5poUx8jfavrr9TqOdDswnwzIexdgnJUCYE4I89PCKW8VFU65sK_EQkmwTx4K5-Iv6Eu5wC6rgpb_IEexAcvmaF1zbTw6TFCrtgvdR0r2UcLp8pJOQ',
                'images' => [],
                'specifications' => [
                    ['label' => 'Tub Material', 'value' => 'HEAVY-GAUGE STEEL'],
                    ['label' => 'Capacity', 'value' => '6 CUBIC FEET'],
                ],
            ],
            [
                'name' => 'Wire Mesh BRC M6 5.4m x 2.1m',
                'slug' => 'wire-mesh-brc-m6',
                'sku' => 'MESH-BRC-M6',
                'description' => 'Kawat bendrat BRC M6 untuk pengecoran plat lantai dan dak. Standard SNI, dilapisi anti-karat.',
                'category' => 'Building Materials',
                'brand' => 'Roman Ceramics',
                'price' => 510000,
                'price_display' => 'Rp 510.000',
                'unit' => 'lembar',
                'stock_status' => 'in_stock',
                'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuD1LywPFNl4kx3hn-Ay4PVC1Yq1vB9kwr7HiPA_hCvofGysf4ItDxcHuShqulr7_FKJjL9iYTKrUBqCbC42idH8EibuEV_tSLs9ZXeZcpLLDtT_DchOpM-HKub-ogKUWSqnWYGdWrkCePYAuTP2H6usMlOeMj_J0cpb-uOkSy1fheDTMa6djDsNXoA4LyQGItSi_fSft2CQcLerY4lbYTBjnyJGNB--3w_bbMY15dMKKbnOtNPG93_UGA',
                'images' => [],
                'specifications' => [
                    ['label' => 'Size', 'value' => '5.4m x 2.1m'],
                    ['label' => 'Wire Diameter', 'value' => 'M6 (6mm)'],
                    ['label' => 'Spacing', 'value' => '200mm x 200mm'],
                ],
            ],
            [
                'name' => 'Bor Listrik Impact Drill 13mm',
                'slug' => 'bor-listrik-impact-drill-13mm',
                'sku' => 'TL-IMP-13',
                'description' => 'Bor listrik impact drill dengan kapasitas chuck 13mm. Cocok untuk pengeboran beton, kayu, dan logam.',
                'category' => 'Tools & Equipment',
                'brand' => 'Semen Indonesia',
                'price' => 850000,
                'price_display' => 'Rp 850.000',
                'unit' => 'unit',
                'stock_status' => 'low_stock',
                'image_url' => '',
                'images' => [],
                'specifications' => [
                    ['label' => 'Chuck Capacity', 'value' => '13mm'],
                    ['label' => 'Power', 'value' => '710W'],
                    ['label' => 'RPM', 'value' => '0-3000 RPM'],
                ],
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
