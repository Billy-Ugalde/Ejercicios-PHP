import { Progress } from '@/components/ui/progress';

const projects = [
    { name: 'Migración de servidor', value: 20, indicatorClassName: 'bg-destructive' },
    { name: 'Seguimiento de ventas', value: 40, indicatorClassName: 'bg-chart-4' },
    { name: 'Base de datos de clientes', value: 60, indicatorClassName: 'bg-chart-1' },
    { name: 'Otro', value: 80, indicatorClassName: 'bg-chart-3' },
];

export function ProjectsCard() {
    return (
        <div className="space-y-5">
            {projects.map((project) => (
                <div key={project.name}>
                    <div className="mb-1.5 flex items-center justify-between text-sm">
                        <span className="font-medium">{project.name}</span>
                        <span className="text-muted-foreground">{project.value}%</span>
                    </div>
                    <Progress
                        value={project.value}
                        indicatorClassName={project.indicatorClassName}
                    />
                </div>
            ))}
        </div>
    );
}
