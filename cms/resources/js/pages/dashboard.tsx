import { Head, usePage } from '@inertiajs/react';
import {
    BadgeCheck,
    CalendarDays,
    ShieldAlert,
    ShieldCheck,
    UserRound,
} from 'lucide-react';
import type { ComponentType, ReactNode } from 'react';
import { EarningsOverviewChart } from '@/components/dashboard/earnings-chart';
import { ProjectsCard } from '@/components/dashboard/projects-card';
import { RevenueSourcesChart } from '@/components/dashboard/revenue-chart';
import { Badge } from '@/components/ui/badge';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { cn } from '@/lib/utils';
import { dashboard } from '@/routes';
import type { Auth } from '@/types';

type PageProps = {
    auth: Auth;
};

function StatCard({
    label,
    value,
    icon: Icon,
    accent,
}: {
    label: string;
    value: ReactNode;
    icon: ComponentType<{ className?: string }>;
    accent: 'primary' | 'success' | 'warning';
}) {
    const accentBorder = {
        primary: 'border-l-primary',
        success: 'border-l-emerald-500',
        warning: 'border-l-amber-500',
    }[accent];

    const accentIcon = {
        primary: 'text-primary',
        success: 'text-emerald-500',
        warning: 'text-amber-500',
    }[accent];

    return (
        <Card className={cn('border-l-4 py-4', accentBorder)}>
            <CardContent className="flex items-center justify-between px-4">
                <div>
                    <p className="text-xs font-semibold tracking-wide text-muted-foreground uppercase">
                        {label}
                    </p>
                    <div className="mt-1 text-lg font-bold">{value}</div>
                </div>
                <Icon className={cn('size-8 opacity-70', accentIcon)} />
            </CardContent>
        </Card>
    );
}

export default function Dashboard() {
    const { auth } = usePage<PageProps>().props;
    const { user } = auth;

    return (
        <>
            <Head title="Dashboard" />
            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <div className="grid auto-rows-min gap-4 md:grid-cols-2 xl:grid-cols-4">
                    <StatCard
                        label="Cuenta"
                        value={user.name}
                        icon={UserRound}
                        accent="primary"
                    />
                    <StatCard
                        label="Verificación de email"
                        value={
                            user.email_verified_at ? (
                                <Badge variant="default" className="bg-emerald-500">
                                    Verificado
                                </Badge>
                            ) : (
                                <Badge variant="destructive">Sin verificar</Badge>
                            )
                        }
                        icon={user.email_verified_at ? BadgeCheck : ShieldAlert}
                        accent={user.email_verified_at ? 'success' : 'warning'}
                    />
                    <StatCard
                        label="Autenticación en dos pasos"
                        value={
                            user.two_factor_enabled ? (
                                <Badge variant="default" className="bg-emerald-500">
                                    Activada
                                </Badge>
                            ) : (
                                <Badge variant="secondary">Desactivada</Badge>
                            )
                        }
                        icon={user.two_factor_enabled ? ShieldCheck : ShieldAlert}
                        accent={user.two_factor_enabled ? 'success' : 'warning'}
                    />
                    <StatCard
                        label="Miembro desde"
                        value={new Date(user.created_at).toLocaleDateString()}
                        icon={CalendarDays}
                        accent="primary"
                    />
                </div>

                <div className="grid gap-4 xl:grid-cols-3">
                    <Card className="xl:col-span-2">
                        <CardHeader>
                            <CardTitle>Earnings Overview</CardTitle>
                        </CardHeader>
                        <CardContent>
                            <EarningsOverviewChart />
                        </CardContent>
                    </Card>
                    <Card>
                        <CardHeader>
                            <CardTitle>Revenue Sources</CardTitle>
                        </CardHeader>
                        <CardContent>
                            <RevenueSourcesChart />
                        </CardContent>
                    </Card>
                </div>

                <div className="grid gap-4 xl:grid-cols-2">
                    <Card>
                        <CardHeader>
                            <CardTitle>Projects</CardTitle>
                        </CardHeader>
                        <CardContent>
                            <ProjectsCard />
                        </CardContent>
                    </Card>
                    <Card className="flex items-center justify-center overflow-hidden">
                        <CardContent className="flex items-center justify-center">
                            <img
                                src="/images/undraw_posting_photo.svg"
                                alt=""
                                className="h-48 w-auto"
                            />
                        </CardContent>
                    </Card>
                </div>
            </div>
        </>
    );
}

Dashboard.layout = {
    breadcrumbs: [
        {
            title: 'Dashboard',
            href: dashboard(),
        },
    ],
};
