namespace App\Http\Controllers;

use App\Models\PerformanceReview;
use Illuminate\Http\Request;

class PerformanceReviewController extends Controller
{
    public function index()
    {
        $reviews = PerformanceReview::all();
        return view('performance-reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('performance-reviews.create');
    }

    public function store(Request $request)
    {
        PerformanceReview::create($request->all());
        return redirect()->route('performance-reviews.index');
    }

    public function edit(PerformanceReview $review)
    {
        return view('performance-reviews.edit', compact('review'));
    }

    public function update(Request $request, PerformanceReview $review)
    {
        $review->update($request->all());
        return redirect()->route('performance-reviews.index');
    }

    public function destroy(PerformanceReview $review)
    {
        $review->delete();
        return redirect()->route('performance-reviews.index');
    }
}
