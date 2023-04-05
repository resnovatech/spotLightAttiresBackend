<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
    <style>
        table, td, th {
          border: 1px solid;
          text-align: center;
        }

        table {
          width: 100%;
          border-collapse: collapse;
        }
        </style>
</head>
<body>
    <table class="table table-centered table-nowrap mb-0">
        <thead class="table-light">
        <tr>

            <th>SL</th>
            <th>Product Name</th>
            <th>Category Name</th>
            <th>Subcategory Name</th>
            <th>Price</th>
            <th>SKU</th>

        </tr>
        </thead>
        <tbody>


@foreach($product_list as $key => $all_product_list)
        <tr>


            <td>{{ $key+1 }}</td>
            <td>{{ $all_product_list->product_name }}</td>
            <td>{{ $all_product_list->cat_name }}</td>
            <td>{{ $all_product_list->sub_cat_name }}</td>
            <td>
                {{ $all_product_list->price }}
            </td>
            <td>
                {{ $all_product_list->sku }}
            </td>


        </tr>
@endforeach
        </tbody>
    </table>
</body>
</html>
