# testEukles

## 🏁 Getting Started <a name = "getting_started"></a>

### Installing

Steps:

- git clone https://github.com/allucyne/E-deal-back
- Deploy the project
```sh
cd testEukles
docker-compose up -d
```
- Insert values to database
```sh
docker exec -it TEST-Eukles-app php artisan db:seed
```

### Routing

- Add materiel : http://localhost:8070/
- Show total sell : http://localhost:8070/showtotalvendu
- show customers have more than 2 pieces of equipment, and whose equipment sold exceeds 3,000 euros: http://localhost:8070/showtotal
- it's possible to change the number of piece of equipment and the sold exceeded by a client with the show() function :

```sh
public function show()
    {
        $clients =DB::table('clients')
            ->leftJoin('liens', 'liens.id_client', '=', 'clients.id_client')
            ->leftJoin('materiels', function($join){
                $join->on('materiels.id_materiel', '=', 'liens.id_materiel');       
            })
            ->groupby('clients.name')
            ->select('clients.name', DB::raw('SUM(materiels.prix) as total_sales'),DB::raw('COUNT(materiels.id_materiel) as sales'))
            ->having('sales', '>', 2)
            ->having('total_sales', '>', 3000)   
            ->get();

        return view('showtotal')->with('clients',$clients);
    }
```

