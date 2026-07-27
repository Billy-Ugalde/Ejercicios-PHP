import { Cell, Pie, PieChart, ResponsiveContainer, Tooltip } from 'recharts';

const data = [
    { name: 'Direct', value: 55, color: 'var(--color-chart-1)' },
    { name: 'Social', value: 30, color: 'var(--color-chart-3)' },
    { name: 'Referral', value: 15, color: 'var(--color-chart-2)' },
];

export function RevenueSourcesChart() {
    return (
        <div className="flex flex-col gap-4">
            <ResponsiveContainer width="100%" height={220}>
                <PieChart>
                    <Pie
                        data={data}
                        dataKey="value"
                        nameKey="name"
                        innerRadius={64}
                        outerRadius={92}
                        paddingAngle={2}
                        stroke="var(--card)"
                        strokeWidth={2}
                    >
                        {data.map((entry) => (
                            <Cell key={entry.name} fill={entry.color} />
                        ))}
                    </Pie>
                    <Tooltip
                        contentStyle={{
                            backgroundColor: 'var(--popover)',
                            borderColor: 'var(--border)',
                            borderRadius: 'var(--radius)',
                            color: 'var(--popover-foreground)',
                            fontSize: 12,
                        }}
                        formatter={(value, name) => [`${value}%`, name]}
                    />
                </PieChart>
            </ResponsiveContainer>
            <ul className="flex flex-wrap items-center justify-center gap-4 text-sm">
                {data.map((entry) => (
                    <li key={entry.name} className="flex items-center gap-1.5">
                        <span
                            className="size-2.5 rounded-full"
                            style={{ backgroundColor: entry.color }}
                        />
                        <span className="text-muted-foreground">{entry.name}</span>
                    </li>
                ))}
            </ul>
        </div>
    );
}
