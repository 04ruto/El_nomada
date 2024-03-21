<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Activity;
use App\Models\Booking;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Flight;
use App\Models\Hotel;
use App\Models\Invoice;
use App\Models\Pack;
use App\Models\Product;
use App\Models\Review;
use App\Models\Transportation;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Inserts para la tabla users
        User::insert([
            ['name' => 'Administrador', 'email' => 'admin@admin.com', 'password' => Hash::make('admin12345'), 'role' => 'admin', 'status' => 1],
            ['name' => 'John Doe', 'email' => 'john@example.com', 'password' => Hash::make('guest12345'), 'role' => 'user', 'status' => 1],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'password' => Hash::make('guest12345'), 'role' => 'user', 'status' => 1],
            ['name' => 'Alice Johnson', 'email' => 'alice@example.com', 'password' => Hash::make('guest12345'), 'role' => 'user', 'status' => 1],
            ['name' => 'Bob Brown', 'email' => 'bob@example.com', 'password' => Hash::make('guest12345'), 'role' => 'user', 'status' => 1],
            ['name' => 'Emily Wilson', 'email' => 'emily@example.com', 'password' => Hash::make('guest12345'), 'role' => 'user', 'status' => 1],
            ['name' => 'Michael Johnson', 'email' => 'michael@example.com', 'password' => Hash::make('guest12345'), 'role' => 'user', 'status' => 1],
            ['name' => 'Emma Brown', 'email' => 'emma@example.com', 'password' => Hash::make('guest12345'), 'role' => 'user', 'status' => 1],
            ['name' => 'William Davis', 'email' => 'william@example.com', 'password' => Hash::make('guest12345'), 'role' => 'user', 'status' => 1],
            ['name' => 'Olivia Garcia', 'email' => 'olivia@example.com', 'password' => Hash::make('guest12345'), 'role' => 'user', 'status' => 1],
            ['name' => 'James Wilson', 'email' => 'james@example.com', 'password' => Hash::make('guest12345'), 'role' => 'user', 'status' => 1],

        ]);

        // Inserts para la tabla categories
        Category::insert([
            ['name' => 'Adventure', 'status' => 1],
            ['name' => 'Beach', 'status' => 1],
            ['name' => 'City Break', 'status' => 1],
            ['name' => 'Cultural', 'status' => 1],
            ['name' => 'Luxury', 'status' => 1],
            ['name' => 'Family', 'status' => 1],
            ['name' => 'Solo Travel', 'status' => 1],
            ['name' => 'Adventure Sports', 'status' => 1],
            ['name' => 'Historical', 'status' => 1],
            ['name' => 'Nature', 'status' => 1],
        ]);

        // Inserts para la tabla countries
        Country::insert([
            ['name' => 'United States', 'code' => 'us'],
            ['name' => 'Spain', 'code' => 'es'],
            ['name' => 'Italy', 'code' => 'it'],
            ['name' => 'France', 'code' => 'fr'],
            ['name' => 'Australia', 'code' => 'au'],
            ['name' => 'Canada', 'code' => 'ca'],
            ['name' => 'Germany', 'code' => 'de'],
            ['name' => 'Japan', 'code' => 'jp'],
            ['name' => 'Brazil', 'code' => 'br'],
            ['name' => 'United Kingdom', 'code' => 'gb'],
            ['name' => 'Mexico', 'code' => 'mx'],
            ['name' => 'China', 'code' => 'cn'],
            ['name' => 'India', 'code' => 'in'],
            ['name' => 'Russia', 'code' => 'ru'],
            ['name' => 'South Korea', 'code' => 'kr'],
            ['name' => 'South Africa', 'code' => 'za'],
            ['name' => 'Argentina', 'code' => 'ar'],
            ['name' => 'Chile', 'code' => 'cl'],
            ['name' => 'Peru', 'code' => 'pe'],
            ['name' => 'Colombia', 'code' => 'co'],
            ['name' => 'Costa Rica', 'code' => 'cr'],
            ['name' => 'Panama', 'code' => 'pa'],
            ['name' => 'Ecuador', 'code' => 'ec'],
            ['name' => 'Venezuela', 'code' => 've'],
            ['name' => 'Bolivia', 'code' => 'bo'],
            ['name' => 'Paraguay', 'code' => 'py'],
            ['name' => 'Uruguay', 'code' => 'uy'],
            ['name' => 'Guatemala', 'code' => 'gt'],
            ['name' => 'Honduras', 'code' => 'hn'],
            ['name' => 'El Salvador', 'code' => 'sv'],
            ['name' => 'Nicaragua', 'code' => 'ni'],
            ['name' => 'Costa Rica', 'code' => 'cr'],
            ['name' => 'Panama', 'code' => 'pa'],
            ['name' => 'Cuba', 'code' => 'cu'],
            ['name' => 'Jamaica', 'code' => 'jm'],
            ['name' => 'Haiti', 'code' => 'ht'],
            ['name' => 'Dominican Republic', 'code' => 'do'],
            ['name' => 'Puerto Rico', 'code' => 'pr'],
            ['name' => 'Trinidad and Tobago', 'code' => 'tt'],
            ['name' => 'Barbados', 'code' => 'bb'],
            ['name' => 'Bahamas', 'code' => 'bs']
        ]);

        // Inserts para la tabla cities
        City::insert([
            ['name' => 'New York', 'country_id' => 1],
            ['name' => 'Barcelona', 'country_id' => 2],
            ['name' => 'Rome', 'country_id' => 3],
            ['name' => 'Paris', 'country_id' => 4],
            ['name' => 'Sydney', 'country_id' => 5],
            ['name' => 'Toronto', 'country_id' => 6],
            ['name' => 'Berlin', 'country_id' => 7],
            ['name' => 'Tokyo', 'country_id' => 8],
            ['name' => 'Rio de Janeiro', 'country_id' => 9],
            ['name' => 'London', 'country_id' => 10],
        ]);

        // Inserts para la tabla products
        Product::insert([
            // Hoteles (1-10)
            ['name' => 'Marriott Marquis', 'type' => 'hotels', 'description' => 'Luxury hotel in the heart of Times Square', 'price' => 250, 'status' => 1],
            ['name' => 'W Barcelona', 'type' => 'hotels', 'description' => 'Beachfront hotel with stunning views of the Mediterranean Sea', 'price' => 300, 'status' => 1],
            ['name' => 'Rome Cavalieri Waldorf Astoria', 'type' => 'hotels', 'description' => 'Luxurious resort overlooking Rome', 'price' => 350, 'status' => 1],
            ['name' => 'Four Seasons Hotel George V', 'type' => 'hotels', 'description' => 'Elegant hotel near the Champs-Élysées', 'price' => 400, 'status' => 1],
            ['name' => 'Park Hyatt Sydney', 'type' => 'hotels', 'description' => 'Harborfront luxury hotel with panoramic views of Sydney Opera House', 'price' => 380, 'status' => 1],
            ['name' => 'Fairmont Royal York', 'type' => 'hotels', 'description' => 'Historic luxury hotel in downtown Toronto', 'price' => 280, 'status' => 1],
            ['name' => 'Ritz-Carlton Berlin', 'type' => 'hotels', 'description' => 'Luxurious hotel located at Potsdamer Platz', 'price' => 320, 'status' => 1],
            ['name' => 'Park Hyatt Tokyo', 'type' => 'hotels', 'description' => 'Luxury hotel in the heart of Shinjuku', 'price' => 400, 'status' => 1],
            ['name' => 'Belmond Copacabana Palace', 'type' => 'hotels', 'description' => 'Iconic luxury hotel on Copacabana Beach', 'price' => 350, 'status' => 1],
            ['name' => 'The Savoy', 'type' => 'hotels', 'description' => 'Historic luxury hotel on the banks of the Thames', 'price' => 450, 'status' => 1],

            // Packs (11-20)
            ['name' => 'New York Explorer Pack', 'type' => 'packs', 'description' => 'Explore the best of New York City with this comprehensive pack', 'price' => 500, 'status' => 1],
            ['name' => 'Barcelona Beach Getaway', 'type' => 'packs', 'description' => 'Enjoy sun, sand, and relaxation on the beaches of Barcelona', 'price' => 450, 'status' => 1],
            ['name' => 'Roman Holiday', 'type' => 'packs', 'description' => 'Discover the ancient wonders of Rome with guided tours and excursions', 'price' => 550, 'status' => 1],
            ['name' => 'Parisian Romance', 'type' => 'packs', 'description' => 'Experience the romance of Paris with a stay in a luxury hotel and romantic dinners', 'price' => 600, 'status' => 1],
            ['name' => 'Sydney Adventure', 'type' => 'packs', 'description' => 'Embark on thrilling adventures in and around Sydney', 'price' => 520, 'status' => 1],
            ['name' => 'Canadian Wilderness Adventure', 'type' => 'packs', 'description' => 'Explore the breathtaking landscapes of Canada', 'price' => 600, 'status' => 1],
            ['name' => 'German Beer Tour', 'type' => 'packs', 'description' => 'Experience the best of German beer culture', 'price' => 550, 'status' => 1],
            ['name' => 'Japanese Cultural Immersion', 'type' => 'packs', 'description' => 'Immerse yourself in the traditions of Japan', 'price' => 700, 'status' => 1],
            ['name' => 'Brazilian Carnival Experience', 'type' => 'packs', 'description' => 'Join the world-famous festivities in Rio de Janeiro', 'price' => 800, 'status' => 1],
            ['name' => 'London Theater Break', 'type' => 'packs', 'description' => 'Enjoy top West End shows in the heart of London', 'price' => 750, 'status' => 1],

            // Flights (21-30)
            ['name' => 'Flight from New York to Barcelona', 'type' => 'flights', 'description' => 'Direct flight from JFK to Barcelona-El Prat Airport', 'price' => 700, 'status' => 1],
            ['name' => 'Flight from Barcelona to Rome', 'type' => 'flights', 'description' => 'Direct flight from Barcelona-El Prat Airport to Leonardo da Vinci–Fiumicino Airport', 'price' => 650, 'status' => 1],
            ['name' => 'Flight from Rome to Paris', 'type' => 'flights', 'description' => 'Direct flight from Leonardo da Vinci–Fiumicino Airport to Charles de Gaulle Airport', 'price' => 750, 'status' => 1],
            ['name' => 'Flight from Paris to Sydney', 'type' => 'flights', 'description' => 'Direct flight from Charles de Gaulle Airport to Sydney Kingsford Smith Airport', 'price' => 800, 'status' => 1],
            ['name' => 'Flight from Sydney to New York', 'type' => 'flights', 'description' => 'Direct flight from Sydney Kingsford Smith Airport to JFK', 'price' => 780, 'status' => 1],
            ['name' => 'Flight from Toronto to Berlin', 'type' => 'flights', 'description' => 'Direct flight from Toronto Pearson International Airport to Berlin Tegel Airport', 'price' => 900, 'status' => 1],
            ['name' => 'Flight from Berlin to Tokyo', 'type' => 'flights', 'description' => 'Direct flight from Berlin Tegel Airport to Narita International Airport', 'price' => 1100, 'status' => 1],
            ['name' => 'Flight from Tokyo to Rio de Janeiro', 'type' => 'flights', 'description' => 'Direct flight from Narita International Airport to Rio de Janeiro-Galeão International Airport', 'price' => 1200, 'status' => 1],
            ['name' => 'Flight from Rio de Janeiro to London', 'type' => 'flights', 'description' => 'Direct flight from Rio de Janeiro-Galeão International Airport to London Heathrow Airport', 'price' => 1300, 'status' => 1],
            ['name' => 'Flight from London to Toronto', 'type' => 'flights', 'description' => 'Direct flight from London Heathrow Airport to Toronto Pearson International Airport', 'price' => 1100, 'status' => 1],

            // Activities (31-40)
            ['name' => 'Broadway Show in New York', 'type' => 'activities', 'description' => 'Experience the magic of Broadway with a top-rated show', 'price' => 150, 'status' => 1],
            ['name' => 'Sagrada Familia Tour in Barcelona', 'type' => 'activities', 'description' => 'Guided tour of Antoni Gaudí’s masterpiece', 'price' => 120, 'status' => 1],
            ['name' => 'Colosseum Guided Tour in Rome', 'type' => 'activities', 'description' => 'Explore the iconic Colosseum with a knowledgeable guide', 'price' => 180, 'status' => 1],
            ['name' => 'Louvre Museum Tour in Paris', 'type' => 'activities', 'description' => 'Discover masterpieces at the world-renowned Louvre Museum', 'price' => 200, 'status' => 1],
            ['name' => 'Sydney Harbour Bridge Climb', 'type' => 'activities', 'description' => 'Climb the Sydney Harbour Bridge for breathtaking views of the city', 'price' => 160, 'status' => 1],
            ['name' => 'Niagara Falls Tour', 'type' => 'activities', 'description' => 'Experience the power and beauty of Niagara Falls', 'price' => 150, 'status' => 1],
            ['name' => 'Berlin Wall Walking Tour', 'type' => 'activities', 'description' => 'Learn about the history of the Berlin Wall', 'price' => 120, 'status' => 1],
            ['name' => 'Tokyo Disneyland', 'type' => 'activities', 'description' => 'Magical theme park fun for the whole family', 'price' => 180, 'status' => 1],
            ['name' => 'Sugarloaf Mountain Hike', 'type' => 'activities', 'description' => 'Enjoy stunning views of Rio de Janeiro', 'price' => 200, 'status' => 1],
            ['name' => 'London Eye Experience', 'type' => 'activities', 'description' => 'See London from above on the iconic London Eye', 'price' => 160, 'status' => 1],

            // Transportations (41-50)
            ['name' => 'Taxi from JFK to Times Square', 'type' => 'transportations', 'description' => 'Convenient taxi service from airport to hotel', 'price' => 50, 'status' => 1],
            ['name' => 'Barcelona Metro Pass', 'type' => 'transportations', 'description' => 'Unlimited access to Barcelona’s metro system for convenient travel', 'price' => 30, 'status' => 1],
            ['name' => 'Rome Hop-On Hop-Off Bus Tour', 'type' => 'transportations', 'description' => 'Explore Rome at your own pace with a hop-on hop-off bus tour', 'price' => 40, 'status' => 1],
            ['name' => 'Paris Metro Pass', 'type' => 'transportations', 'description' => 'Easy transportation around Paris with unlimited metro access', 'price' => 35, 'status' => 1],
            ['name' => 'Sydney Ferries Day Pass', 'type' => 'transportations', 'description' => 'Enjoy scenic ferry rides around Sydney Harbour', 'price' => 45, 'status' => 1],
            ['name' => 'Taxi from Pearson Airport to Fairmont Royal York', 'type' => 'transportations', 'description' => 'Convenient taxi service from airport to hotel', 'price' => 60, 'status' => 1],
            ['name' => 'Berlin U-Bahn Pass', 'type' => 'transportations', 'description' => 'Unlimited access to Berlin’s U-Bahn system for convenient travel', 'price' => 40, 'status' => 1],
            ['name' => 'Tokyo JR Pass', 'type' => 'transportations', 'description' => 'Explore Tokyo and beyond with unlimited JR train travel', 'price' => 70, 'status' => 1],
            ['name' => 'Rio Metro Pass', 'type' => 'transportations', 'description' => 'Easy transportation around Rio de Janeiro with unlimited metro access', 'price' => 55, 'status' => 1],
            ['name' => 'London Oyster Card', 'type' => 'transportations', 'description' => 'Convenient pay-as-you-go travel on London’s public transport network', 'price' => 45, 'status' => 1],
        ]);

        // Inserts para la tabla hotels
        Hotel::insert([
            ['product_id' => 1, 'city_id' => 1, 'amenities' => 'Fitness center, Spa, Rooftop bar', 'entrance_date' => '2024-03-01', 'leave_date' => '2024-03-05'],
            ['product_id' => 2, 'city_id' => 2, 'amenities' => 'Infinity pool, Spa, Beach club', 'entrance_date' => '2024-03-01', 'leave_date' => '2024-03-05'],
            ['product_id' => 3, 'city_id' => 3, 'amenities' => 'Spa, Michelin-starred restaurant, Tennis courts', 'entrance_date' => '2024-03-01', 'leave_date' => '2024-03-05'],
            ['product_id' => 4, 'city_id' => 4, 'amenities' => 'Michelin-starred restaurant, Spa, Courtyard garden', 'entrance_date' => '2024-03-01', 'leave_date' => '2024-03-05'],
            ['product_id' => 5, 'city_id' => 5, 'amenities' => 'Infinity pool, Rooftop bar, Luxury spa', 'entrance_date' => '2024-03-01', 'leave_date' => '2024-03-05'],
            ['product_id' => 6, 'city_id' => 6, 'amenities' => 'Indoor pool, Spa, Rooftop restaurant', 'entrance_date' => '2024-02-10', 'leave_date' => '2024-02-15'],
            ['product_id' => 7, 'city_id' => 7, 'amenities' => 'Spa, Michelin-starred restaurant, Fitness center', 'entrance_date' => '2024-02-11', 'leave_date' => '2024-02-16'],
            ['product_id' => 8, 'city_id' => 8, 'amenities' => 'Infinity pool, Teppanyaki restaurant, Spa', 'entrance_date' => '2024-02-12', 'leave_date' => '2024-02-17'],
            ['product_id' => 9, 'city_id' => 9, 'amenities' => 'Rooftop bar, Beach access, Spa', 'entrance_date' => '2024-02-13', 'leave_date' => '2024-02-18'],
            ['product_id' => 10, 'city_id' => 10, 'amenities' => 'Luxury spa, Fine dining restaurant, Cocktail bar', 'entrance_date' => '2024-02-14', 'leave_date' => '2024-02-19'],
        ]);

        // Inserts para la tabla packs
        Pack::insert([
            ['product_id' => 11, 'category_id' => 1],
            ['product_id' => 12, 'category_id' => 2],
            ['product_id' => 13, 'category_id' => 3],
            ['product_id' => 14, 'category_id' => 4],
            ['product_id' => 15, 'category_id' => 5],
            ['product_id' => 16, 'category_id' => 6],
            ['product_id' => 17, 'category_id' => 7],
            ['product_id' => 18, 'category_id' => 8],
            ['product_id' => 19, 'category_id' => 9],
            ['product_id' => 20, 'category_id' => 10],

        ]);

        // Inserts para la tabla flights
        Flight::insert([
            ['product_id' => 21, 'departure_city_id' => 1, 'arrival_city_id' => 2, 'departure_date' => '2024-03-01 08:00:00', 'arrival_date' => '2024-03-01 12:00:00'],
            ['product_id' => 22, 'departure_city_id' => 2, 'arrival_city_id' => 3, 'departure_date' => '2024-03-02 08:00:00', 'arrival_date' => '2024-03-02 12:00:00'],
            ['product_id' => 23, 'departure_city_id' => 3, 'arrival_city_id' => 4, 'departure_date' => '2024-03-03 08:00:00', 'arrival_date' => '2024-03-03 12:00:00'],
            ['product_id' => 24, 'departure_city_id' => 4, 'arrival_city_id' => 5, 'departure_date' => '2024-03-04 08:00:00', 'arrival_date' => '2024-03-04 12:00:00'],
            ['product_id' => 25, 'departure_city_id' => 5, 'arrival_city_id' => 1, 'departure_date' => '2024-03-05 08:00:00', 'arrival_date' => '2024-03-05 12:00:00'],
            ['product_id' => 26, 'departure_city_id' => 6, 'arrival_city_id' => 7, 'departure_date' => '2024-02-10 08:00:00', 'arrival_date' => '2024-02-10 12:00:00'],
            ['product_id' => 27, 'departure_city_id' => 7, 'arrival_city_id' => 8, 'departure_date' => '2024-02-11 08:00:00', 'arrival_date' => '2024-02-11 12:00:00'],
            ['product_id' => 28, 'departure_city_id' => 8, 'arrival_city_id' => 9, 'departure_date' => '2024-02-12 08:00:00', 'arrival_date' => '2024-02-12 12:00:00'],
            ['product_id' => 29, 'departure_city_id' => 9, 'arrival_city_id' => 10, 'departure_date' => '2024-02-13 08:00:00', 'arrival_date' => '2024-02-13 12:00:00'],
            ['product_id' => 30, 'departure_city_id' => 10, 'arrival_city_id' => 6, 'departure_date' => '2024-02-14 08:00:00', 'arrival_date' => '2024-02-14 12:00:00'],

        ]);

        // Inserts para la tabla activities
        Activity::insert([
            ['product_id' => 31, 'city_id' => 1, 'act_date' => '2024-03-01'],
            ['product_id' => 32, 'city_id' => 2, 'act_date' => '2024-03-02'],
            ['product_id' => 33, 'city_id' => 3, 'act_date' => '2024-03-03'],
            ['product_id' => 34, 'city_id' => 4, 'act_date' => '2024-03-04'],
            ['product_id' => 35, 'city_id' => 5, 'act_date' => '2024-03-05'],
            ['product_id' => 36, 'city_id' => 6, 'act_date' => '2024-02-10'],
            ['product_id' => 37, 'city_id' => 7, 'act_date' => '2024-02-11'],
            ['product_id' => 38, 'city_id' => 8, 'act_date' => '2024-02-12'],
            ['product_id' => 39, 'city_id' => 9, 'act_date' => '2024-02-13'],
            ['product_id' => 40, 'city_id' => 10, 'act_date' => '2024-02-14'],

        ]);

        // Inserts para la tabla transportations
        Transportation::insert([
            ['product_id' => 41, 'type' => 'Taxi', 'departure_city_id' => 1, 'arrival_city_id' => 2],
            ['product_id' => 42, 'type' => 'Tren', 'departure_city_id' => 2, 'arrival_city_id' => 3],
            ['product_id' => 43, 'type' => 'Bus', 'departure_city_id' => 3, 'arrival_city_id' => 4],
            ['product_id' => 44, 'type' => 'Tren', 'departure_city_id' => 4, 'arrival_city_id' => 5],
            ['product_id' => 45, 'type' => 'Ferry', 'departure_city_id' => 5, 'arrival_city_id' => 1],
            ['product_id' => 46, 'type' => 'Taxi', 'departure_city_id' => 6, 'arrival_city_id' => 7],
            ['product_id' => 47, 'type' => 'Tren', 'departure_city_id' => 7, 'arrival_city_id' => 8],
            ['product_id' => 48, 'type' => 'Bus', 'departure_city_id' => 8, 'arrival_city_id' => 9],
            ['product_id' => 49, 'type' => 'Tren', 'departure_city_id' => 9, 'arrival_city_id' => 10],
            ['product_id' => 50, 'type' => 'Ferry', 'departure_city_id' => 10, 'arrival_city_id' => 6],

        ]);

        // Inserts para la tabla reviews
        Review::insert([
            ['user_id' => mt_rand(1, 10), 'product_id' => 1, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Wonderful stay at the Marriott Marquis!', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 1, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Great location and excellent service.', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 2, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Fantastic views from W Barcelona', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 2, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Enjoyed the beachfront amenities.', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 3, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Great experience at Rome Cavalieri', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 3, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Luxurious accommodations and amazing views.', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 4, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Absolutely loved Four Seasons George V', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 4, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Top-notch service and elegant atmosphere.', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 5, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Park Hyatt Sydney exceeded expectations!', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 5, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Breathtaking views and impeccable service.', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 6, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Great hotel experience in Toronto!', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 6, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Excellent service at Fairmont Royal York', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 7, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Wonderful time at Ritz-Carlton Berlin', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 7, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Enjoyed the luxurious amenities', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 8, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Beautiful views from Park Hyatt Tokyo', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 8, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Luxury at its finest!', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 9, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Belmond Copacabana Palace was amazing', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 9, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Best beachfront hotel experience', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 10, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'The Savoy exceeded all expectations', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 10, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Outstanding service and amenities', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 11, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Great value for the Canadian Wilderness Adventure', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 11, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Enjoyed exploring the natural beauty of Canada', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 12, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Loved the German Beer Tour', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 12, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Authentic German beer experience', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 13, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Great way to experience Japanese culture', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 13, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Tokyo is amazing!', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 14, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Had a blast at the Brazilian Carnival', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 14, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Fun and festive atmosphere', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 15, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'London Theater Break was fantastic', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 15, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Great shows and excellent accommodations', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 16, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Enjoyed the Niagara Falls Tour', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 16, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Breathtaking views!', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 17, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Learned a lot on the Berlin Wall Walking Tour', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 17, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Fascinating history lesson', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 18, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Tokyo Disneyland was a blast!', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 18, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Great fun for the whole family', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 19, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Sugarloaf Mountain Hike was challenging but rewarding', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 19, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Beautiful views of Rio de Janeiro', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 20, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'London Eye Experience was unforgettable', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 20, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Amazing views of London!', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 21, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Convenient taxi service in Toronto', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 21, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Quick and efficient transportation', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 22, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Berlin U-Bahn Pass made getting around easy', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 22, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Crowded trains but convenient', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 23, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Tokyo JR Pass was a great value', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 23, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Unlimited travel made exploring Tokyo easy', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 24, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Rio Metro Pass was convenient', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 24, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Easy access to all parts of Rio de Janeiro', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 25, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'London Oyster Card made travel hassle-free', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 25, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Convenient and easy to use', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 26, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Comfortable taxi ride in Toronto', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 26, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Professional and friendly service', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 27, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Berlin U-Bahn made exploring easy', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 27, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Convenient transportation option', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 28, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Tokyo JR Pass saved time and money', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 28, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Great way to get around Tokyo', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 29, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Rio Metro Pass was convenient', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 29, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Easy access to all parts of Rio', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 30, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'London Oyster Card was handy', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 30, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Convenient for exploring London', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 31, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Great taxi service in Toronto', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 31, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Quick and reliable transportation', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 32, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Convenient Berlin U-Bahn Pass', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 32, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Crowded but efficient transportation', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 33, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'JR Pass made traveling in Tokyo easy', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 33, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Convenient and cost-effective', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 34, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Enjoyed exploring Rio with Metro Pass', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 34, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Easy access to attractions', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 35, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Oyster Card made London travel smooth', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 35, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Efficient and easy to use', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 36, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Taxi service in Toronto was reliable', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 36, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Professional and courteous drivers', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 37, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Berlin U-Bahn Pass was convenient', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 37, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Easy to navigate the system', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 38, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'JR Pass made traveling around Tokyo easy', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 38, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Great value for money', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 39, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Rio Metro Pass was convenient', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 39, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Easy access to all attractions', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 40, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'London Oyster Card was convenient', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 40, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Efficient way to travel in London', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 41, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Toronto taxi service was excellent', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 41, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Quick and reliable transportation', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 42, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Berlin U-Bahn Pass was convenient', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 42, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Crowded but efficient transportation', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 43, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'JR Pass made traveling in Tokyo easy', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 43, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Convenient and cost-effective', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 44, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Enjoyed exploring Rio with Metro Pass', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 44, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Easy access to attractions', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 45, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Oyster Card made London travel smooth', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 45, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Efficient and easy to use', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 46, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Taxi service in Toronto was reliable', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 46, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Professional and courteous drivers', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 47, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Berlin U-Bahn Pass was convenient', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 47, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Easy to navigate the system', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 48, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'JR Pass made traveling around Tokyo easy', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 48, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Great value for money', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 49, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Rio Metro Pass was convenient', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 49, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Easy access to all attractions', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 50, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'London Oyster Card was convenient', 'status' => 1],
            ['user_id' => mt_rand(1, 10), 'product_id' => 50, 'rating' => mt_rand(0, 10) + mt_rand(0, 99) / 100, 'comment' => 'Efficient way to travel in London', 'status' => 1],
        ]);

        // Inserts para la tabla bookings
        Booking::insert([
            ['user_id' => mt_rand(1, 10), 'product_id' => mt_rand(1, 50), 'total_price' => 800],
            ['user_id' => mt_rand(1, 10), 'product_id' => mt_rand(1, 50), 'total_price' => 750],
            ['user_id' => mt_rand(1, 10), 'product_id' => mt_rand(1, 50), 'total_price' => 900],
            ['user_id' => mt_rand(1, 10), 'product_id' => mt_rand(1, 50), 'total_price' => 850],
            ['user_id' => mt_rand(1, 10), 'product_id' => mt_rand(1, 50), 'total_price' => 880],
            ['user_id' => mt_rand(1, 10), 'product_id' => mt_rand(1, 50), 'total_price' => 400],
            ['user_id' => mt_rand(1, 10), 'product_id' => mt_rand(1, 50), 'total_price' => 350],
            ['user_id' => mt_rand(1, 10), 'product_id' => mt_rand(1, 50), 'total_price' => 450],
            ['user_id' => mt_rand(1, 10), 'product_id' => mt_rand(1, 50), 'total_price' => 500],
            ['user_id' => mt_rand(1, 10), 'product_id' => mt_rand(1, 50), 'total_price' => 420],
            ['user_id' => mt_rand(1, 10), 'product_id' => mt_rand(1, 50), 'total_price' => 380],
            ['user_id' => mt_rand(1, 10), 'product_id' => mt_rand(1, 50), 'total_price' => 300],
            ['user_id' => mt_rand(1, 10), 'product_id' => mt_rand(1, 50), 'total_price' => 550],
            ['user_id' => mt_rand(1, 10), 'product_id' => mt_rand(1, 50), 'total_price' => 400],
            ['user_id' => mt_rand(1, 10), 'product_id' => mt_rand(1, 50), 'total_price' => 480],
        ]);

        $paym_status = ['pagado', 'pendiente', 'cancelado', 'reembolsado'];

        $start_date = strtotime('2022-01-01');
        $end_date = strtotime('2022-12-31');
        $random_date = rand($start_date, $end_date);
        $formatted_date = date('Y-m-d', $random_date);

        // Inserts para la tabla invoices
        Invoice::insert([
            ['user_id' => mt_rand(1, 10), 'total_amount' => 800, 'payment_status' => $paym_status[array_rand($paym_status)], 'payment_date' => $formatted_date, 'booking_id' => 1],
            ['user_id' => mt_rand(1, 10), 'total_amount' => 750, 'payment_status' => $paym_status[array_rand($paym_status)], 'payment_date' => $formatted_date, 'booking_id' => 2],
            ['user_id' => mt_rand(1, 10), 'total_amount' => 900, 'payment_status' => $paym_status[array_rand($paym_status)], 'payment_date' => $formatted_date, 'booking_id' => 3],
            ['user_id' => mt_rand(1, 10), 'total_amount' => 850, 'payment_status' => $paym_status[array_rand($paym_status)], 'payment_date' => $formatted_date, 'booking_id' => 4],
            ['user_id' => mt_rand(1, 10), 'total_amount' => 880, 'payment_status' => $paym_status[array_rand($paym_status)], 'payment_date' => $formatted_date, 'booking_id' => 5],
            ['user_id' => mt_rand(1, 10), 'total_amount' => 400, 'payment_status' => $paym_status[array_rand($paym_status)], 'payment_date' => $formatted_date, 'booking_id' => 6],
            ['user_id' => mt_rand(1, 10), 'total_amount' => 350, 'payment_status' => $paym_status[array_rand($paym_status)], 'payment_date' => $formatted_date, 'booking_id' => 7],
            ['user_id' => mt_rand(1, 10), 'total_amount' => 450, 'payment_status' => $paym_status[array_rand($paym_status)], 'payment_date' => $formatted_date, 'booking_id' => 8],
            ['user_id' => mt_rand(1, 10), 'total_amount' => 500, 'payment_status' => $paym_status[array_rand($paym_status)], 'payment_date' => $formatted_date, 'booking_id' => 9],
            ['user_id' => mt_rand(1, 10), 'total_amount' => 420, 'payment_status' => $paym_status[array_rand($paym_status)], 'payment_date' => $formatted_date, 'booking_id' => 10],
            ['user_id' => mt_rand(1, 10), 'total_amount' => 380, 'payment_status' => $paym_status[array_rand($paym_status)], 'payment_date' => $formatted_date, 'booking_id' => 11],
            ['user_id' => mt_rand(1, 10), 'total_amount' => 300, 'payment_status' => $paym_status[array_rand($paym_status)], 'payment_date' => $formatted_date, 'booking_id' => 12],
            ['user_id' => mt_rand(1, 10), 'total_amount' => 550, 'payment_status' => $paym_status[array_rand($paym_status)], 'payment_date' => $formatted_date, 'booking_id' => 13],
            ['user_id' => mt_rand(1, 10), 'total_amount' => 400, 'payment_status' => $paym_status[array_rand($paym_status)], 'payment_date' => $formatted_date, 'booking_id' => 14],
            ['user_id' => mt_rand(1, 10), 'total_amount' => 480, 'payment_status' => $paym_status[array_rand($paym_status)], 'payment_date' => $formatted_date, 'booking_id' => 15],

        ]);


        // User::factory(10)->insert();

        // \App\Models\User::factory()->insert([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
