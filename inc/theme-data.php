<?php
/**
 * Central content arrays used by templates.
 */

if (!defined('ABSPATH')) {
    exit;
}

function hubby_services(): array
{
    return [
        'pest-control' => [
            'title' => 'Pest Control',
            'short' => 'Flat monthly protection for common East Valley pests.',
            'tag' => 'Included in Every Plan',
            'icon' => 'shield',
        ],
        'scorpion-control' => [
            'title' => 'Scorpion Control',
            'short' => 'Targeted barrier treatments for Arizona scorpions, inside and out.',
            'tag' => 'East Valley Specialist',
            'icon' => 'scorpion',
        ],
        'rodent-control' => [
            'title' => 'Rodent Control',
            'short' => 'Entry-point inspection, exclusion guidance, and monitoring stations.',
            'tag' => 'Plus & Premium',
            'icon' => 'target',
        ],
        'mosquito-treatment' => [
            'title' => 'Mosquito Treatment',
            'short' => 'Larvicide and adult population control for more comfortable yards.',
            'tag' => 'Premium Add-On',
            'icon' => 'spark',
        ],
        'weed-spray' => [
            'title' => 'Weed Spray',
            'short' => 'Monthly curb, crack, and yard-edge weed control add-on.',
            'tag' => '$29/mo Add-On',
            'icon' => 'leaf',
        ],
    ];
}

function hubby_plans(): array
{
    return [
        [
            'name' => 'Essential',
            'price' => '49',
            'note' => 'Up to 2,000 sq ft',
            'featured' => false,
            'features' => [
                'General pest and scorpion barrier',
                'Quarterly exterior service',
                'Interior treatment on first visit',
                'Free retreatments between visits',
                'No contracts or cancellation fees',
            ],
        ],
        [
            'name' => 'Plus',
            'price' => '65',
            'note' => '2,000-3,500 sq ft',
            'featured' => true,
            'features' => [
                'Everything in Essential',
                'Monthly exterior service',
                'Spider web removal every visit',
                'Rodent inspection and monitoring',
                'Same technician whenever possible',
            ],
        ],
        [
            'name' => 'Premium',
            'price' => '89',
            'note' => '3,500+ sq ft / custom',
            'featured' => false,
            'features' => [
                'Everything in Plus',
                'Mosquito treatment included',
                'Rodent monitoring stations',
                'Priority scheduling',
                'Expanded exterior coverage',
            ],
        ],
    ];
}

function hubby_locations(): array
{
    return [
        'gilbert' => 'Gilbert',
        'chandler' => 'Chandler',
        'queen-creek' => 'Queen Creek',
        'mesa' => 'Mesa',
        'tempe' => 'Tempe',
    ];
}

function hubby_faqs(): array
{
    return [
        ['Is there a contract or commitment?', 'No contracts ever. Month-to-month protection with no cancellation fees or penalties.'],
        ['Are materials and chemicals included?', 'Yes. Materials, scheduled service, and retreatments between scheduled visits are included in your flat monthly rate.'],
        ['What is the price-lock guarantee?', 'The rate you sign up at stays yours. If pricing changes later for new customers, existing subscribers keep their original rate.'],
        ['Do I need to be home during the visit?', 'We prefer someone home for the first visit. After that, many subscribers provide access instructions for exterior service.'],
        ['What areas do you serve?', 'Hubby Pest Control serves Gilbert, Chandler, Queen Creek, Mesa, and Tempe in Arizona.'],
        ['Are technicians licensed in Arizona?', 'Technicians are licensed through the Arizona Office of Pest Management, background-checked, and insured.'],
    ];
}

