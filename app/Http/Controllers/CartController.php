<?php
namespace App\Http\Controllers;

use App\Models\Assietes;
use App\Models\Bols;
use App\Models\Product;
use App\Models\Order;
use App\Models\Item;
use App\Models\Plats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $total = 0;
        $viewData = [
            "title" => "Cart - Hand-Made",
            "subtitle" => "Shopping Cart",
            "total" => $total,
            "products" => [],
            "plats" => [],
            "assietes" => [],
            "bols" => []
        ];

        // Manage Products
        $productsInSession = $request->session()->get("products");
        if ($productsInSession) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $viewData["products"] = $productsInCart;
            $viewData["total"] += Product::sumPricesByQuantities($productsInCart, $productsInSession);
        }

        // Manage Plats
        $platsInSession = $request->session()->get("plats");
        if ($platsInSession) {
            $platsInCart = Plats::findMany(array_keys($platsInSession));
            $viewData["plats"] = $platsInCart;
            $viewData["total"] += Plats::sumPricesByQuantities($platsInCart, $platsInSession);
        }

        // Manage Assietes
        $assietesInSession = $request->session()->get("assietes");
        if ($assietesInSession) {
            $assietesInCart = Assietes::findMany(array_keys($assietesInSession));
            $viewData["assietes"] = $assietesInCart;
            $viewData["total"] += Assietes::sumPricesByQuantities($assietesInCart, $assietesInSession);
        }

        // Manage Bols
        $bolsInSession = $request->session()->get("bols");
        if ($bolsInSession) {
            $bolsInCart = Bols::findMany(array_keys($bolsInSession));
            $viewData["bols"] = $bolsInCart;
            $viewData["total"] += Bols::sumPricesByQuantities($bolsInCart, $bolsInSession);
        }

        return view('cart.index')->with("viewData", $viewData);
    }

    public function add(Request $request, $id)
    {
        // Manage Products
        $products = $request->session()->get("products", []);
        $products[$id] = $request->input('quantity');
        $request->session()->put('products', $products);

        // Manage Bols
        $bols = $request->session()->get("bols", []);
        $bols[$id] = $request->input('quantity');
        $request->session()->put('bols', $bols);

        // Manage Plats
        $plats = $request->session()->get("plats", []);
        $plats[$id] = $request->input('quantity');
        $request->session()->put('plats', $plats);

        // Manage Assietes
        $assietes = $request->session()->get("assietes", []);
        $assietes[$id] = $request->input('quantity');
        $request->session()->put('assietes', $assietes);

        return redirect()->route('cart.index');
    }

    public function delete(Request $request)
    {
        $request->session()->forget(['products', 'bols', 'plats', 'assietes']);
        return back();
    }

    public function remove(Request $request, $id, $type)
    {
        $sessionKey = $type . 's';  // product => products, bol => bols, etc.

        $items = $request->session()->get($sessionKey);

        if (isset($items[$id])) {
            unset($items[$id]);
            $request->session()->put($sessionKey, $items);
        }

        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }

    public function purchase(Request $request)
    {
        $this->processPurchase($request, 'products', Product::class);
        $this->processPurchase($request, 'plats', Plats::class);
        $this->processPurchase($request, 'assietes', Assietes::class);
        $this->processPurchase($request, 'bols', Bols::class);

        return redirect()->route('cart.index');
    }

    private function processPurchase(Request $request, $sessionKey, $modelClass)
    {
        $itemsInSession = $request->session()->get($sessionKey);
        if ($itemsInSession) {
            $userId = Auth::user()->getId();
            $order = new Order();
            $order->setUserId($userId);
            $order->setTotal(0);
            $order->save();

            $total = 0;
            $itemsInCart = $modelClass::findMany(array_keys($itemsInSession));
            foreach ($itemsInCart as $item) {
                $quantity = $itemsInSession[$item->getId()];
                $orderItem = new Item();
                $orderItem->setQuantity($quantity);
                $orderItem->setPrice($item->getPrice());
                $orderItem->setProductId($item->getId()); // Assuming the field name is always `product_id`
                $orderItem->setOrderId($order->getId());
                $orderItem->save();
                $total += ($item->getPrice() * $quantity);
            }
            $order->setTotal($total);
            $order->save();

            $newBalance = Auth::user()->getBalance() - $total;
            Auth::user()->setBalance($newBalance);
            Auth::user()->save();

            $request->session()->forget($sessionKey);

            $viewData = [
                "title" => "Purchase - Hand-Made",
                "subtitle" => "Purchase Status",
                "order" => $order
            ];
            return view('cart.purchase')->with("viewData", $viewData);
        }
    }
}
