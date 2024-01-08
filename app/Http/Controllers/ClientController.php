<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    public function home() {
        $clients = Client::all();
        return View('home', compact('clients'));
    }

    public function index() {
        $clients = Client::all();
        $clients = Client::orderBy('id', 'desc')->get();

        return View('client/index', compact('clients'));
    }

    public function create() {
        return View('client/create');
    }

    public function store(Client $client) {
        try {
            request()->validate([
                'fio' => 'required|unique:clients,fio',
                'phone' => 'required',
            ]);

            $client->create([
                'fio' => request('fio'),
                'phone' => request('phone'),
                'address' => request('address'),
                'info' => request('info'),
            ]);

            //return redirect()->route('client.create')->with('success', 'Клиент успешно создан!');
            return view('client.create')->with('success', 'Клиент успешно создан!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Валидация не прошла, возвращаем пользователя на предыдущую страницу с ошибками
            return redirect()->route('client.create')->withErrors($e->errors());
        } catch (\Exception $e) {
            // Другие исключения можно обработать по-разному, например, залогировать их
            \Log::error($e->getMessage());
            return redirect()->route('client.create')->with('error', 'Произошла ошибка. Пожалуйста, попробуйте позже.');
        }
    }

    public function edit(Client $client) {
        return View('client/edit', compact('client'));
    }
    public function update(Client $client) {
        request()->validate([
            'fio' => 'required',
            'phone' => 'required'
        ]);
        $client->update([
            'fio' => request('fio'),
            'phone' => request('phone'),
            'address' => request('address'),
            'info' => request('info')
        ]);
        return redirect()->route('client');
    }
    public function destroy(Client $client) {
        $client->delete();
        return redirect()->route('client');
    }

    public function getCodes($clientId)
    {
        $client = Client::find($clientId);

        // Retrieve codes for the given client
        $codes = $client->codes;

        return response()->json($codes);
    }

    // list of unpaid clients
    public  function unpaid()
    {
        $unpaid_list = DB::select(query: "SELECT
    i.client_id,
    c.fio,
    c.phone,
    SUM(invoice_sum(i.id)) AS summ
FROM
    invoices AS i
JOIN
    clients AS c ON i.client_id = c.id
WHERE
    i.payed_status_id != 1
GROUP BY
    i.client_id, c.fio ,   c.phone;
");

        return view('client.unpaid', compact('unpaid_list'));
    }
}
