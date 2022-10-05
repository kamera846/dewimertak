<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;

class CountVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        if (Visitor::where('visit_date', today())->where('ip_address', $ip)->count() < 1)
        {
            Visitor::create([
                'visit_date' => today(),
                'ip_address' => $ip,
            ]);
        }
        return $next($request);
    }
}
