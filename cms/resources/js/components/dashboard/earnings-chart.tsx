import {
    CartesianGrid,
    Line,
    LineChart,
    ResponsiveContainer,
    Tooltip,
    XAxis,
    YAxis,
} from 'recharts';

const data = [
    { month: 'Ene', earnings: 0 },
    { month: 'Feb', earnings: 9200 },
    { month: 'Mar', earnings: 5900 },
    { month: 'Abr', earnings: 12300 },
    { month: 'May', earnings: 7000 },
    { month: 'Jun', earnings: 19200 },
    { month: 'Jul', earnings: 11900 },
    { month: 'Ago', earnings: 18400 },
    { month: 'Sep', earnings: 12700 },
    { month: 'Oct', earnings: 23100 },
    { month: 'Nov', earnings: 21200 },
    { month: 'Dic', earnings: 31400 },
];

export function EarningsOverviewChart() {
    return (
        <ResponsiveContainer width="100%" height={320}>
            <LineChart data={data} margin={{ top: 8, right: 8, left: 0, bottom: 0 }}>
                <CartesianGrid vertical={false} stroke="var(--border)" strokeDasharray="4 4" />
                <XAxis
                    dataKey="month"
                    tickLine={false}
                    axisLine={false}
                    tick={{ fill: 'var(--muted-foreground)', fontSize: 12 }}
                />
                <YAxis
                    tickLine={false}
                    axisLine={false}
                    tick={{ fill: 'var(--muted-foreground)', fontSize: 12 }}
                    tickFormatter={(value: number) => `$${value / 1000}k`}
                    width={48}
                />
                <Tooltip
                    cursor={{ stroke: 'var(--border)' }}
                    contentStyle={{
                        backgroundColor: 'var(--popover)',
                        borderColor: 'var(--border)',
                        borderRadius: 'var(--radius)',
                        color: 'var(--popover-foreground)',
                        fontSize: 12,
                    }}
                    formatter={(value) => [`$${Number(value).toLocaleString()}`, 'Earnings']}
                />
                <Line
                    type="monotone"
                    dataKey="earnings"
                    stroke="var(--color-chart-1)"
                    strokeWidth={2}
                    dot={{ r: 3, fill: 'var(--color-chart-1)', strokeWidth: 0 }}
                    activeDot={{ r: 5 }}
                />
            </LineChart>
        </ResponsiveContainer>
    );
}
